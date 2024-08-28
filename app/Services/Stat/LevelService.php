<?php

namespace App\Services\Stat;

use App\Models\Level\Level;
use App\Models\Level\LevelRequirement;
use App\Models\Level\LevelReward;
use App\Services\Service;
use DB;
use Illuminate\Support\Arr;

class LevelService extends Service {
    /**
     * Creates a new level.
     *
     * @param mixed $data
     * @param mixed $type
     * @param mixed $user
     */
    public function createLevel($data, $type, $user) {
        DB::beginTransaction();

        try {
            $level = Level::create([
                'level'        => $data['level'],
                'level_type'   => $type,
                'exp_required' => $data['exp_required'],
                'description'  => $data['description'],
            ]);

            $this->populateRewards(Arr::only($data, ['rewardable_type', 'rewardable_id', 'quantity']), $level);
            $this->populateLimits($level, Arr::only($data, ['limit_type', 'limit_id', 'limit_quantity']));

            return $this->commitReturn($level);
        } catch (\Exception $e) {
            $this->setError('error', $e->getMessage());
        }

        return $this->rollbackReturn(false);
    }

    /**
     * Updates a level.
     *
     * @param mixed $level
     * @param mixed $data
     */
    public function updateLevel($level, $data) {
        DB::beginTransaction();

        try {
            $level->update([
                'level'        => $data['level'],
                'exp_required' => $data['exp_required'],
                'description'  => $data['description'],
            ]);

            $this->populateRewards(Arr::only($data, ['rewardable_type', 'rewardable_id', 'quantity']), $level);
            $this->populateLimits($level, Arr::only($data, ['limit_type', 'limit_id', 'limit_quantity']));

            return $this->commitReturn($level);
        } catch (\Exception $e) {
            $this->setError('error', $e->getMessage());
        }

        return $this->rollbackReturn(false);
    }

    /**
     * Deletes a level.
     *
     * @param mixed $level
     */
    public function deleteLevel($level) {
        DB::beginTransaction();

        try {
            // Check first if the level is currently owned or if some other site feature uses it
            if (DB::table('user_levels')->where('current_level', '>=', $level->level)->exists()) {
                throw new \Exception('At least one user has already reached this level.');
            }
            if (DB::table('prompts')->where('level_req', '>=', $level->level)->exists()) {
                throw new \Exception('A prompt currently has this level as a requirement.');
            }
            $level->rewards()->delete();
            $level->delete();

            return $this->commitReturn(true);
        } catch (\Exception $e) {
            $this->setError('error', $e->getMessage());
        }

        return $this->rollbackReturn(false);
    }

    /*******************************************************************************
     *
     *  OTHER FUNCTIONS
     *
     ******************************************************************************/

    /**
     * Processes user input for creating/updating level rewards.
     *
     * @param array $data
     * @param Level $level
     */
    private function populateRewards($data, $level) {
        // Clear the old rewards...
        $level->rewards()->delete();
        if (isset($data['rewardable_type'])) {
            foreach ($data['rewardable_type'] as $key => $type) {
                if ($data['rewardable_id'][$key] == 'none') {
                    $data['rewardable_id'][$key] = null;
                }
                LevelReward::create([
                    'level_id'        => $level->id,
                    'rewardable_type' => $type,
                    'rewardable_id'   => $data['rewardable_id'][$key],
                    'quantity'        => $data['quantity'][$key],
                ]);
            }
        }
    }

    /**
     * Processes user input for creating/updating level requirements.
     *
     * @param array $data
     * @param Level $level
     */
    private function populateLimits($level, $data) {
        $level->limits()->delete();

        if (isset($data['limit_type'])) {
            foreach ($data['limit_type'] as $key => $type) {
                LevelRequirement::create([
                    'level_id'        => $level->id,
                    'limit_type'      => $type,
                    'limit_id'        => $data['limit_id'][$key],
                    'quantity'        => $data['limit_quantity'][$key],
                ]);
            }
        }
    }
}
