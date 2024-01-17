<script>
    $(document).ready(function() {
        var $lootTable = $('#lootTableBody');
        var $lootRow = $('#lootRow').find('.loot-row');
        var $itemSelect = $('#lootRowData').find('.item-select');
        var $PetSelect = $('#lootRowData').find('.pet-select');
        var $WeaponSelect = $('#lootRowData').find('.weapon-select');
        var $GearSelect = $('#lootRowData').find('.gear-select');
        var $currencySelect = $('#lootRowData').find('.currency-select');
        var $claymoreSelect = $('#lootRowData').find('.claymore-select');
        @if ($showLootTables)
            var $tableSelect = $('#lootRowData').find('.table-select');
        @endif
        @if ($showRaffles)
            var $raffleSelect = $('#lootRowData').find('.raffle-select');
        @endif

        refreshChances();
        $('#lootTableBody .selectize').selectize();
        attachRemoveListener($('#lootTableBody .remove-loot-button'));

        $('#addLoot').on('click', function(e) {
            e.preventDefault();
            var $clone = $lootRow.clone();
            $lootTable.append($clone);
            attachRewardTypeListener($clone.find('.reward-type'));
            attachRemoveListener($clone.find('.remove-loot-button'));
            attachWeightListener($clone.find('.loot-weight'));
            refreshChances();
        });

        $('.reward-type').on('change', function(e) {
            var val = $(this).val();
            var $cell = $(this).parent().find('.loot-row-select');

            var $clone = null;
            if (val == 'Item') $clone = $itemSelect.clone();
            else if (val == 'Currency') $clone = $currencySelect.clone();
            else if (val == 'Pet') $clone = $PetSelect.clone();
            else if (val == 'Weapon') $clone = $WeaponSelect.clone();
            else if (val == 'Gear') $clone = $GearSelect.clone();
            else if (val == 'Exp') $clone = $claymoreSelect.clone();
            @if ($showLootTables)
                else if (val == 'LootTable') $clone = $tableSelect.clone();
            @endif
            @if ($showRaffles)
                else if (val == 'Raffle') $clone = $raffleSelect.clone();
            @endif

            $cell.html('');
            $cell.append($clone);
        });

        function attachRewardTypeListener(node) {
            node.on('change', function(e) {
                var val = $(this).val();
                var $cell = $(this).parent().parent().find('.loot-row-select');

                var $clone = null;
                if (val == 'Item') $clone = $itemSelect.clone();
                else if (val == 'Currency') $clone = $currencySelect.clone();
                else if (val == 'Pet') $clone = $PetSelect.clone();
                else if (val == 'Weapon') $clone = $WeaponSelect.clone();
                else if (val == 'Gear') $clone = $GearSelect.clone();
                else if (val == 'Exp') $clone = $claymoreSelect.clone();
                @if ($showLootTables)
                    else if (val == 'LootTable') $clone = $tableSelect.clone();
                @endif
                @if ($showRaffles)
                    else if (val == 'Raffle') $clone = $raffleSelect.clone();
                @endif

                $cell.html('');
                $cell.append($clone);
                $clone.selectize();
            });
        }

        function attachRemoveListener(node) {
            node.on('click', function(e) {
                e.preventDefault();
                $(this).parent().parent().remove();
                refreshChances();
            });
        }

        function attachWeightListener(node) {
            node.on('change', function(e) {
                refreshChances();
            });
        }

        function refreshChances() {
            var total = 0;
            var weights = [];
            $('#lootTableBody .loot-weight').each(function(index) {
                var current = parseInt($(this).val());
                total += current;
                weights.push(current);
            });


            $('#lootTableBody .loot-row-chance').each(function(index) {
                var current = (weights[index] / total) * 100;
                $(this).html(current.toString() + '%');
            });
        }

    });
</script>
