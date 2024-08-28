<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Routes for users with powers.
|
*/

Route::get('/', 'HomeController@getIndex');

Route::get('logs', 'HomeController@getLogs');
Route::group(['middleware' => 'admin'], function () {
    Route::get('staff-reward-settings', 'HomeController@getStaffRewardSettings');
    Route::post('staff-reward-settings/{key}', 'HomeController@postEditStaffRewardSetting');
});

Route::group(['prefix' => 'users', 'namespace' => 'Users'], function () {
    // USER LIST
    Route::group(['middleware' => 'power:edit_user_info'], function () {
        Route::get('/', 'UserController@getIndex');

        Route::get('{name}/edit', 'UserController@getUser');
        Route::post('{name}/basic', 'UserController@postUserBasicInfo');
        Route::post('{name}/alias/{id}', 'UserController@postUserAlias');
        Route::post('{name}/account', 'UserController@postUserAccount');
        Route::post('{name}/birthday', 'UserController@postUserBirthday');
        Route::get('{name}/updates', 'UserController@getUserUpdates');

        Route::get('{name}/ban', 'UserController@getBan');
        Route::get('{name}/ban-confirm', 'UserController@getBanConfirmation');
        Route::post('{name}/ban', 'UserController@postBan');
        Route::get('{name}/unban-confirm', 'UserController@getUnbanConfirmation');
        Route::post('{name}/unban', 'UserController@postUnban');

        Route::get('{name}/deactivate', 'UserController@getDeactivate');
        Route::get('{name}/deactivate-confirm', 'UserController@getDeactivateConfirmation');
        Route::post('{name}/deactivate', 'UserController@postDeactivate');
        Route::get('{name}/reactivate-confirm', 'UserController@getReactivateConfirmation');
        Route::post('{name}/reactivate', 'UserController@postReactivate');
    });

    // RANKS
    Route::group(['middleware' => 'admin'], function () {
        Route::get('ranks', 'RankController@getIndex');
        Route::get('ranks/create', 'RankController@getCreateRank');
        Route::get('ranks/edit/{id}', 'RankController@getEditRank');
        Route::get('ranks/delete/{id}', 'RankController@getDeleteRank');
        Route::post('ranks/create', 'RankController@postCreateEditRank');
        Route::post('ranks/edit/{id?}', 'RankController@postCreateEditRank');
        Route::post('ranks/delete/{id}', 'RankController@postDeleteRank');
        Route::post('ranks/sort', 'RankController@postSortRanks');
    });
});

// SETTINGS
Route::group(['prefix' => 'invitations', 'middleware' => 'power:edit_site_settings'], function () {
    Route::get('/', 'InvitationController@getIndex');

    Route::post('create', 'InvitationController@postGenerateKey');
    Route::post('delete/{id}', 'InvitationController@postDeleteKey');
});

// FILE MANAGER
Route::group(['prefix' => 'files', 'middleware' => 'power:edit_site_settings'], function () {
    Route::get('/{folder?}', 'FileController@getIndex');

    Route::post('upload', 'FileController@postUploadFile');
    Route::post('move', 'FileController@postMoveFile');
    Route::post('rename', 'FileController@postRenameFile');
    Route::post('delete', 'FileController@postDeleteFile');
    Route::post('folder/create', 'FileController@postCreateFolder');
    Route::post('folder/delete', 'FileController@postDeleteFolder');
    Route::post('folder/rename', 'FileController@postRenameFolder');
});

// SITE IMAGES
Route::group(['prefix' => 'images', 'middleware' => 'power:edit_site_settings'], function () {
    Route::get('/', 'FileController@getSiteImages');

    Route::post('upload/css', 'FileController@postUploadCss');
    Route::post('upload', 'FileController@postUploadImage');
    Route::post('reset', 'FileController@postResetFile');
});

// DATA
Route::group(['prefix' => 'data', 'namespace' => 'Data', 'middleware' => 'power:edit_data'], function () {
    // GALLERIES
    Route::get('galleries', 'GalleryController@getIndex');
    Route::get('galleries/create', 'GalleryController@getCreateGallery');
    Route::get('galleries/edit/{id}', 'GalleryController@getEditGallery');
    Route::get('galleries/delete/{id}', 'GalleryController@getDeleteGallery');
    Route::post('galleries/create', 'GalleryController@postCreateEditGallery');
    Route::post('galleries/edit/{id?}', 'GalleryController@postCreateEditGallery');
    Route::post('galleries/delete/{id}', 'GalleryController@postDeleteGallery');
    Route::post('galleries/sort', 'GalleryController@postSortGallery');

    // CURRENCIES
    Route::get('currencies', 'CurrencyController@getIndex');
    Route::get('currencies/sort', 'CurrencyController@getSort');
    Route::get('currencies/create', 'CurrencyController@getCreateCurrency');
    Route::get('currencies/edit/{id}', 'CurrencyController@getEditCurrency');
    Route::get('currencies/delete/{id}', 'CurrencyController@getDeleteCurrency');
    Route::post('currencies/create', 'CurrencyController@postCreateEditCurrency');
    Route::post('currencies/edit/{id?}', 'CurrencyController@postCreateEditCurrency');
    Route::post('currencies/delete/{id}', 'CurrencyController@postDeleteCurrency');
    Route::post('currencies/sort/{type}', 'CurrencyController@postSortCurrency')->where('type', 'user|character');

    // RARITIES
    Route::get('rarities', 'RarityController@getIndex');
    Route::get('rarities/create', 'RarityController@getCreateRarity');
    Route::get('rarities/edit/{id}', 'RarityController@getEditRarity');
    Route::get('rarities/delete/{id}', 'RarityController@getDeleteRarity');
    Route::post('rarities/create', 'RarityController@postCreateEditRarity');
    Route::post('rarities/edit/{id?}', 'RarityController@postCreateEditRarity');
    Route::post('rarities/delete/{id}', 'RarityController@postDeleteRarity');
    Route::post('rarities/sort', 'RarityController@postSortRarity');

    // SPECIES
    Route::get('species', 'SpeciesController@getIndex');
    Route::get('species/create', 'SpeciesController@getCreateSpecies');
    Route::get('species/edit/{id}', 'SpeciesController@getEditSpecies');
    Route::get('species/delete/{id}', 'SpeciesController@getDeleteSpecies');
    Route::post('species/create', 'SpeciesController@postCreateEditSpecies');
    Route::post('species/edit/{id?}', 'SpeciesController@postCreateEditSpecies');
    Route::post('species/delete/{id}', 'SpeciesController@postDeleteSpecies');
    Route::post('species/sort', 'SpeciesController@postSortSpecies');

    Route::get('subtypes', 'SpeciesController@getSubtypeIndex');
    Route::get('subtypes/create', 'SpeciesController@getCreateSubtype');
    Route::get('subtypes/edit/{id}', 'SpeciesController@getEditSubtype');
    Route::get('subtypes/delete/{id}', 'SpeciesController@getDeleteSubtype');
    Route::post('subtypes/create', 'SpeciesController@postCreateEditSubtype');
    Route::post('subtypes/edit/{id?}', 'SpeciesController@postCreateEditSubtype');
    Route::post('subtypes/delete/{id}', 'SpeciesController@postDeleteSubtype');
    Route::post('subtypes/sort', 'SpeciesController@postSortSubtypes');

    Route::get('pet-drops', 'PetController@getDropIndex');
    Route::get('pet-drops/create', 'PetController@getCreateDrop');
    Route::get('pet-drops/edit/{id}', 'PetController@getEditDrop');
    Route::get('pet-drops/delete/{id}', 'PetController@getDeleteDrop');
    Route::post('pet-drops/create', 'PetController@postCreateEditDrop');
    Route::post('pet-drops/edit/{id?}', 'PetController@postCreateEditDrop');
    Route::post('pet-drops/delete/{id}', 'PetController@postDeleteDrop');

    // ITEMS
    Route::get('item-categories', 'ItemController@getIndex');
    Route::get('item-categories/create', 'ItemController@getCreateItemCategory');
    Route::get('item-categories/edit/{id}', 'ItemController@getEditItemCategory');
    Route::get('item-categories/delete/{id}', 'ItemController@getDeleteItemCategory');
    Route::post('item-categories/create', 'ItemController@postCreateEditItemCategory');
    Route::post('item-categories/edit/{id?}', 'ItemController@postCreateEditItemCategory');
    Route::post('item-categories/delete/{id}', 'ItemController@postDeleteItemCategory');
    Route::post('item-categories/sort', 'ItemController@postSortItemCategory');

    Route::get('items', 'ItemController@getItemIndex');
    Route::get('items/create', 'ItemController@getCreateItem');
    Route::get('items/edit/{id}', 'ItemController@getEditItem');
    Route::get('items/delete/{id}', 'ItemController@getDeleteItem');
    Route::post('items/create', 'ItemController@postCreateEditItem');
    Route::post('items/edit/{id?}', 'ItemController@postCreateEditItem');
    Route::post('items/delete/{id}', 'ItemController@postDeleteItem');

    Route::get('items/delete-tag/{id}/{tag}', 'ItemController@getDeleteItemTag');
    Route::post('items/delete-tag/{id}/{tag}', 'ItemController@postDeleteItemTag');
    Route::get('items/tag/{id}/{tag}', 'ItemController@getEditItemTag');
    Route::post('items/tag/{id}/{tag}', 'ItemController@postEditItemTag');
    Route::get('items/tag/{id}', 'ItemController@getAddItemTag');
    Route::post('items/tag/{id}', 'ItemController@postAddItemTag');

    // PETS
    Route::get('pet-categories', 'PetController@getIndex');
    Route::get('pet-categories/create', 'PetController@getCreatePetCategory');
    Route::get('pet-categories/edit/{id}', 'PetController@getEditPetCategory');
    Route::get('pet-categories/delete/{id}', 'PetController@getDeletePetCategory');
    Route::post('pet-categories/create', 'PetController@postCreateEditPetCategory');
    Route::post('pet-categories/edit/{id?}', 'PetController@postCreateEditPetCategory');
    Route::post('pet-categories/delete/{id}', 'PetController@postDeletePetCategory');
    Route::post('pet-categories/sort', 'PetController@postSortPetCategory');

    Route::get('pets', 'PetController@getPetIndex');
    Route::get('pets/create', 'PetController@getCreatePet');
    Route::get('pets/edit/{id}', 'PetController@getEditPet');
    Route::get('pets/delete/{id}', 'PetController@getDeletePet');
    Route::post('pets/create', 'PetController@postCreateEditPet');
    Route::post('pets/edit/{id?}', 'PetController@postCreateEditPet');
    Route::post('pets/delete/{id}', 'PetController@postDeletePet');

    // variants
    Route::get('pets/edit/{pet_id}/variants/create', 'PetController@getCreateEditVariant');
    Route::get('pets/edit/{pet_id}/variants/edit/{id}', 'PetController@getCreateEditVariant');
    Route::post('pets/edit/{pet_id}/variants/create', 'PetController@postCreateEditVariant');
    Route::post('pets/edit/{pet_id}/variants/edit/{id}', 'PetController@postCreateEditVariant');

    // evolutions
    Route::get('pets/edit/{pet_id}/evolution/create', 'PetController@getCreateEditEvolution');
    Route::get('pets/edit/{pet_id}/evolution/edit/{id}', 'PetController@getCreateEditEvolution');
    Route::post('pets/edit/{pet_id}/evolution/create', 'PetController@postCreateEditEvolution');
    Route::post('pets/edit/{pet_id}/evolution/edit/{id}', 'PetController@postCreateEditEvolution');

    Route::get('pets/drops', 'PetController@getDropIndex');
    Route::get('pets/drops/create', 'PetController@getCreateDrop');
    Route::get('pets/drops/edit/{pet_id}', 'PetController@getEditDrop');
    Route::get('pets/drops/delete/{pet_id}', 'PetController@getDeleteDrop');
    Route::post('pets/drops/create', 'PetController@postCreateEditDrop');
    Route::post('pets/drops/edit/{pet_id}', 'PetController@postCreateEditDrop');
    Route::post('pets/drops/delete/{pet_id}', 'PetController@postDeleteDrop');
    Route::get('pets/drops/widget/{id}', 'PetController@getDropWidget');

    // variants drops
    Route::get('pets/drops/edit/{pet_id}/variants/create', 'PetController@getCreateVariantDrop');
    Route::get('pets/drops/edit/{pet_id}/variants/edit/{variant_id}', 'PetController@getEditVariantDrop');
    Route::post('pets/drops/edit/{pet_id}/variants/create', 'PetController@postCreateEditVariantDrop');
    Route::post('pets/drops/edit/{pet_id}/variants/edit/{variant_id}', 'PetController@postCreateEditVariantDrop');
    Route::get('pets/drops/edit/{pet_id}/variants/delete/{variant_id}', 'PetController@getDeleteVariantDrop');
    Route::post('pets/drops/edit/{pet_id}/variants/delete/{variant_id}', 'PetController@postDeleteVariantDrop');

    // levels
    Route::get('pets/levels', 'PetController@getLevelIndex');
    Route::get('pets/levels/create', 'PetController@getCreateLevel');
    Route::get('pets/levels/edit/{id}', 'PetController@getEditLevel');
    Route::get('pets/levels/delete/{id}', 'PetController@getDeleteLevel');
    Route::post('pets/levels/create', 'PetController@postCreateEditLevel');
    Route::post('pets/levels/edit/{id}', 'PetController@postCreateEditLevel');
    Route::post('pets/levels/delete/{id}', 'PetController@postDeleteLevel');

    // level pets
    Route::get('pets/levels/edit/{level_id}/pets/add', 'PetController@getAddPetToLevel');
    Route::get('pets/levels/edit/{level_id}/pets/edit/{id}', 'PetController@getEditPetLevel');
    Route::post('pets/levels/edit/{level_id}/pets/add', 'PetController@postAddPetToLevel');
    Route::post('pets/levels/edit/{level_id}/pets/edit/{id}', 'PetController@postEditPetLevel');

    // SHOPS
    Route::get('shops', 'ShopController@getIndex');
    Route::get('shops/create', 'ShopController@getCreateShop');
    Route::get('shops/edit/{id}', 'ShopController@getEditShop');
    Route::get('shops/delete/{id}', 'ShopController@getDeleteShop');
    Route::post('shops/create', 'ShopController@postCreateEditShop');
    Route::post('shops/edit/{id?}', 'ShopController@postCreateEditShop');
    Route::post('shops/delete/{id}', 'ShopController@postDeleteShop');
    Route::post('shops/sort', 'ShopController@postSortShop');
    Route::post('shops/restrictions/{id}', 'ShopController@postRestrictShop');
    // stock
    // create
    Route::get('shops/stock/{id}', 'ShopController@getCreateShopStock');
    Route::post('shops/stock/{id}', 'ShopController@postCreateShopStock');
    // edit
    Route::get('shops/stock/edit/{id}', 'ShopController@getEditShopStock');
    Route::post('shops/stock/edit/{id}', 'ShopController@postEditShopStock');
    // delete
    Route::get('shops/stock/delete/{id}', 'ShopController@getDeleteShopStock');
    Route::post('shops/stock/delete/{id}', 'ShopController@postDeleteShopStock');
    // misc
    Route::get('shops/stock-type', 'ShopController@getShopStockType');

    // FEATURES (TRAITS)
    Route::get('trait-categories', 'FeatureController@getIndex');
    Route::get('trait-categories/create', 'FeatureController@getCreateFeatureCategory');
    Route::get('trait-categories/edit/{id}', 'FeatureController@getEditFeatureCategory');
    Route::get('trait-categories/delete/{id}', 'FeatureController@getDeleteFeatureCategory');
    Route::post('trait-categories/create', 'FeatureController@postCreateEditFeatureCategory');
    Route::post('trait-categories/edit/{id?}', 'FeatureController@postCreateEditFeatureCategory');
    Route::post('trait-categories/delete/{id}', 'FeatureController@postDeleteFeatureCategory');
    Route::post('trait-categories/sort', 'FeatureController@postSortFeatureCategory');

    Route::get('traits', 'FeatureController@getFeatureIndex');
    Route::get('traits/create', 'FeatureController@getCreateFeature');
    Route::get('traits/edit/{id}', 'FeatureController@getEditFeature');
    Route::get('traits/delete/{id}', 'FeatureController@getDeleteFeature');
    Route::get('traits/check-subtype', 'FeatureController@getCreateEditFeatureSubtype');
    Route::post('traits/create', 'FeatureController@postCreateEditFeature');
    Route::post('traits/edit/{id?}', 'FeatureController@postCreateEditFeature');
    Route::post('traits/delete/{id}', 'FeatureController@postDeleteFeature');

    // CHARACTER CATEGORIES
    Route::get('character-categories', 'CharacterCategoryController@getIndex');
    Route::get('character-categories/create', 'CharacterCategoryController@getCreateCharacterCategory');
    Route::get('character-categories/edit/{id}', 'CharacterCategoryController@getEditCharacterCategory');
    Route::get('character-categories/delete/{id}', 'CharacterCategoryController@getDeleteCharacterCategory');
    Route::post('character-categories/create', 'CharacterCategoryController@postCreateEditCharacterCategory');
    Route::post('character-categories/edit/{id?}', 'CharacterCategoryController@postCreateEditCharacterCategory');
    Route::post('character-categories/delete/{id}', 'CharacterCategoryController@postDeleteCharacterCategory');
    Route::post('character-categories/sort', 'CharacterCategoryController@postSortCharacterCategory');

    // SUB MASTERLISTS
    Route::get('sublists', 'SublistController@getIndex');
    Route::get('sublists/create', 'SublistController@getCreateSublist');
    Route::get('sublists/edit/{id}', 'SublistController@getEditSublist');
    Route::get('sublists/delete/{id}', 'SublistController@getDeleteSublist');
    Route::post('sublists/create', 'SublistController@postCreateEditSublist');
    Route::post('sublists/edit/{id?}', 'SublistController@postCreateEditSublist');
    Route::post('sublists/delete/{id}', 'SublistController@postDeleteSublist');
    Route::post('sublists/sort', 'SublistController@postSortSublist');

    // LOOT TABLES
    Route::get('loot-tables', 'LootTableController@getIndex');
    Route::get('loot-tables/create', 'LootTableController@getCreateLootTable');
    Route::get('loot-tables/edit/{id}', 'LootTableController@getEditLootTable');
    Route::get('loot-tables/delete/{id}', 'LootTableController@getDeleteLootTable');
    Route::get('loot-tables/roll/{id}', 'LootTableController@getRollLootTable');
    Route::post('loot-tables/create', 'LootTableController@postCreateEditLootTable');
    Route::post('loot-tables/edit/{id?}', 'LootTableController@postCreateEditLootTable');
    Route::post('loot-tables/delete/{id}', 'LootTableController@postDeleteLootTable');

    // PROMPTS
    Route::get('prompt-categories', 'PromptController@getIndex');
    Route::get('prompt-categories/create', 'PromptController@getCreatePromptCategory');
    Route::get('prompt-categories/edit/{id}', 'PromptController@getEditPromptCategory');
    Route::get('prompt-categories/delete/{id}', 'PromptController@getDeletePromptCategory');
    Route::post('prompt-categories/create', 'PromptController@postCreateEditPromptCategory');
    Route::post('prompt-categories/edit/{id?}', 'PromptController@postCreateEditPromptCategory');
    Route::post('prompt-categories/delete/{id}', 'PromptController@postDeletePromptCategory');
    Route::post('prompt-categories/sort', 'PromptController@postSortPromptCategory');

    Route::get('prompts', 'PromptController@getPromptIndex');
    Route::get('prompts/create', 'PromptController@getCreatePrompt');
    Route::get('prompts/edit/{id}', 'PromptController@getEditPrompt');
    Route::get('prompts/delete/{id}', 'PromptController@getDeletePrompt');
    Route::post('prompts/create', 'PromptController@postCreateEditPrompt');
    Route::post('prompts/edit/{id?}', 'PromptController@postCreateEditPrompt');
    Route::post('prompts/delete/{id}', 'PromptController@postDeletePrompt');

    // SKILLS
    Route::get('skills', 'SkillController@getIndex');
    Route::get('skills/create', 'SkillController@getCreateSkill');
    Route::get('skills/edit/{id}', 'SkillController@getEditSkill');
    Route::get('skills/delete/{id}', 'SkillController@getDeleteSkill');
    Route::post('skills/create', 'SkillController@postCreateEditSkill');
    Route::post('skills/edit/{id?}', 'SkillController@postCreateEditSkill');
    Route::post('skills/delete/{id}', 'SkillController@postDeleteSkill');

    // SKILL CATEGORIES
    Route::get('skill-categories', 'SkillController@getCategoryIndex');
    Route::get('skill-categories/create', 'SkillController@getCreateSkillCategory');
    Route::get('skill-categories/edit/{id}', 'SkillController@getEditSkillCategory');
    Route::get('skill-categories/delete/{id}', 'SkillController@getDeleteSkillCategory');
    Route::post('skill-categories/create', 'SkillController@postCreateEditSkillCategory');
    Route::post('skill-categories/edit/{id?}', 'SkillController@postCreateEditSkillCategory');
    Route::post('skill-categories/delete/{id}', 'SkillController@postDeleteSkillCategory');

    // ELEMENTS
    Route::get('elements', 'ElementController@getIndex');
    Route::get('elements/create', 'ElementController@getCreateElement');
    Route::get('elements/edit/{id}', 'ElementController@getEditElement');
    Route::get('elements/delete/{id}', 'ElementController@getDeleteElement');
    Route::post('elements/create', 'ElementController@postCreateEditElement');
    Route::post('elements/edit/{id?}', 'ElementController@postCreateEditElement');
    Route::post('elements/delete/{id}', 'ElementController@postDeleteElement');
});

// PAGES
Route::group(['prefix' => 'pages', 'middleware' => 'power:edit_pages'], function () {
    Route::get('/', 'PageController@getIndex');
    Route::get('create', 'PageController@getCreatePage');
    Route::get('edit/{id}', 'PageController@getEditPage');
    Route::get('delete/{id}', 'PageController@getDeletePage');
    Route::post('create', 'PageController@postCreateEditPage');
    Route::post('edit/{id?}', 'PageController@postCreateEditPage');
    Route::post('delete/{id}', 'PageController@postDeletePage');
});

// NEWS
Route::group(['prefix' => 'news', 'middleware' => 'power:manage_news'], function () {
    Route::get('/', 'NewsController@getIndex');
    Route::get('create', 'NewsController@getCreateNews');
    Route::get('edit/{id}', 'NewsController@getEditNews');
    Route::get('delete/{id}', 'NewsController@getDeleteNews');
    Route::post('create', 'NewsController@postCreateEditNews');
    Route::post('edit/{id?}', 'NewsController@postCreateEditNews');
    Route::post('delete/{id}', 'NewsController@postDeleteNews');
});

// SALES
Route::group(['prefix' => 'sales', 'middleware' => 'power:manage_sales'], function () {
    Route::get('/', 'SalesController@getIndex');
    Route::get('create', 'SalesController@getCreateSales');
    Route::get('edit/{id}', 'SalesController@getEditSales');
    Route::get('delete/{id}', 'SalesController@getDeleteSales');
    Route::post('create', 'SalesController@postCreateEditSales');
    Route::post('edit/{id?}', 'SalesController@postCreateEditSales');
    Route::post('delete/{id}', 'SalesController@postDeleteSales');

    Route::get('character/{slug}', 'SalesController@getCharacterInfo');
});

// SITE SETTINGS
Route::group(['prefix' => 'settings', 'middleware' => 'power:edit_site_settings'], function () {
    Route::get('/', 'SettingsController@getIndex');
    Route::post('{key}', 'SettingsController@postEditSetting');
});

// GRANTS
Route::group(['prefix' => 'grants', 'namespace' => 'Users', 'middleware' => 'power:edit_inventories'], function () {
    Route::get('user-currency', 'GrantController@getUserCurrency');
    Route::post('user-currency', 'GrantController@postUserCurrency');

    Route::get('items', 'GrantController@getItems');
    Route::post('items', 'GrantController@postItems');

<<<<<<< HEAD
    Route::get('item-search', 'GrantController@getItemSearch');
});

# EVENT SETTINGS
Route::group(['prefix' => 'event-settings', 'middleware' => 'power:edit_inventories'], function() {
    Route::get('/', 'EventController@getEventSettings');
    Route::get('clear', 'EventController@getClearEventCurrency');
    Route::post('clear', 'EventController@postClearEventCurrency');
    Route::post('teams', 'EventController@postEventTeams');
=======
    Route::get('exp', 'GrantController@getExp');
    Route::post('exp', 'GrantController@postExp');

    Route::get('points', 'GrantController@getPoints');
    Route::post('points', 'GrantController@postPoints');

    Route::get('pets', 'GrantController@getPets');
    Route::post('pets', 'GrantController@postPets');
    Route::get('pets/variants/{id}', 'GrantController@getPetVariants');
    Route::get('pets/evolutions/{id}', 'GrantController@getPetEvolutions');

    Route::get('weapons', 'GrantController@getWeapons');
    Route::post('weapons', 'GrantController@postWeapons');

    Route::get('gear', 'GrantController@getGear');
    Route::post('gear', 'GrantController@postGear');

    Route::get('skills', 'GrantController@getSkills');
    Route::post('skills', 'GrantController@postSkills');

    Route::get('item-search', 'GrantController@getItemSearch');
});

// PETS
Route::group(['prefix' => 'pets', 'middleware' => 'power:edit_inventories'], function () {
    Route::post('pet/{id}', 'Data\PetController@postEditPetDrop');
>>>>>>> 0e64f5bf38b88c74c42555e1a3de7429f927474e
});

// MASTERLIST
Route::group(['prefix' => 'masterlist', 'namespace' => 'Characters', 'middleware' => 'power:manage_characters'], function () {
    Route::get('create-character', 'CharacterController@getCreateCharacter');
    Route::post('create-character', 'CharacterController@postCreateCharacter');

    Route::get('get-number', 'CharacterController@getPullNumber');

    Route::get('transfers/{type}', 'CharacterController@getTransferQueue');
    Route::get('transfer/{id}', 'CharacterController@getTransferInfo');
    Route::get('transfer/act/{id}/{type}', 'CharacterController@getTransferModal');
    Route::post('transfer/{id}', 'CharacterController@postTransferQueue');

    Route::get('trades/{type}', 'CharacterController@getTradeQueue');
    Route::get('trade/{id}', 'CharacterController@getTradeInfo');
    Route::get('trade/act/{id}/{type}', 'CharacterController@getTradeModal');
    Route::post('trade/{id}', 'CharacterController@postTradeQueue');

    Route::get('create-myo', 'CharacterController@getCreateMyo');
    Route::post('create-myo', 'CharacterController@postCreateMyo');

    Route::get('check-subtype', 'CharacterController@getCreateCharacterMyoSubtype');
    Route::get('check-stats', 'CharacterController@getCreateCharacterMyoStats');
});
Route::group(['prefix' => 'character', 'namespace' => 'Characters', 'middleware' => 'power:edit_inventories'], function () {
    Route::post('{slug}/grant', 'GrantController@postCharacterCurrency');
    Route::post('{slug}/grant-items', 'GrantController@postCharacterItems');
});
Route::group(['prefix' => 'character', 'namespace' => 'Characters', 'middleware' => 'power:manage_characters'], function () {
    // IMAGES
    Route::get('{slug}/image', 'CharacterImageController@getNewImage');
    Route::post('{slug}/image', 'CharacterImageController@postNewImage');
    Route::get('image/subtype', 'CharacterImageController@getNewImageSubtype');

    Route::get('image/{id}/traits', 'CharacterImageController@getEditImageFeatures');
    Route::post('image/{id}/traits', 'CharacterImageController@postEditImageFeatures');
    Route::get('image/traits/subtype', 'CharacterImageController@getEditImageSubtype');

    Route::get('image/{id}/notes', 'CharacterImageController@getEditImageNotes');
    Route::post('image/{id}/notes', 'CharacterImageController@postEditImageNotes');

    Route::get('image/{id}/credits', 'CharacterImageController@getEditImageCredits');
    Route::post('image/{id}/credits', 'CharacterImageController@postEditImageCredits');

    Route::get('image/{id}/reupload', 'CharacterImageController@getImageReupload');
    Route::post('image/{id}/reupload', 'CharacterImageController@postImageReupload');

    Route::post('image/{id}/settings', 'CharacterImageController@postImageSettings');

    Route::get('image/{id}/active', 'CharacterImageController@getImageActive');
    Route::post('image/{id}/active', 'CharacterImageController@postImageActive');

    Route::get('image/{id}/delete', 'CharacterImageController@getImageDelete');
    Route::post('image/{id}/delete', 'CharacterImageController@postImageDelete');

    Route::post('{slug}/images/sort', 'CharacterImageController@postSortImages');

    Route::get('{slug}/typing', 'CharacterImageController@getTyping');
    Route::post('{slug}/typing', 'CharacterImageController@postTyping');

    // CHARACTER
    Route::get('{slug}/stats', 'CharacterController@getEditCharacterStats');
    Route::post('{slug}/stats', 'CharacterController@postEditCharacterStats');

    Route::get('{slug}/description', 'CharacterController@getEditCharacterDescription');
    Route::post('{slug}/description', 'CharacterController@postEditCharacterDescription');

    Route::get('{slug}/profile', 'CharacterController@getEditCharacterProfile');
    Route::post('{slug}/profile', 'CharacterController@postEditCharacterProfile');

    Route::get('{slug}/delete', 'CharacterController@getCharacterDelete');
    Route::post('{slug}/delete', 'CharacterController@postCharacterDelete');

    Route::post('{slug}/settings', 'CharacterController@postCharacterSettings');

    Route::post('{slug}/transfer', 'CharacterController@postTransfer');
});
// Might rewrite these parts eventually so there's less code duplication...
Route::group(['prefix' => 'myo', 'namespace' => 'Characters', 'middleware' => 'power:manage_characters'], function () {
    // CHARACTER
    Route::get('{id}/stats', 'CharacterController@getEditMyoStats');
    Route::post('{id}/stats', 'CharacterController@postEditMyoStats');

    Route::get('{id}/description', 'CharacterController@getEditMyoDescription');
    Route::post('{id}/description', 'CharacterController@postEditMyoDescription');

    Route::get('{id}/profile', 'CharacterController@getEditMyoProfile');
    Route::post('{id}/profile', 'CharacterController@postEditMyoProfile');

    Route::get('{id}/delete', 'CharacterController@getMyoDelete');
    Route::post('{id}/delete', 'CharacterController@postMyoDelete');

    Route::post('{id}/settings', 'CharacterController@postMyoSettings');

    Route::post('{id}/transfer', 'CharacterController@postMyoTransfer');
});

// RAFFLES
Route::group(['prefix' => 'raffles', 'middleware' => 'power:manage_raffles'], function () {
    Route::get('/', 'RaffleController@getRaffleIndex');
    Route::get('edit/group/{id?}', 'RaffleController@getCreateEditRaffleGroup');
    Route::post('edit/group/{id?}', 'RaffleController@postCreateEditRaffleGroup');
    Route::get('edit/raffle/{id?}', 'RaffleController@getCreateEditRaffle');
    Route::post('edit/raffle/{id?}', 'RaffleController@postCreateEditRaffle');

    Route::get('view/{id}', 'RaffleController@getRaffleTickets');
    Route::post('view/ticket/{id}', 'RaffleController@postCreateRaffleTickets');
    Route::post('view/ticket/delete/{id}', 'RaffleController@postDeleteRaffleTicket');

    Route::get('roll/raffle/{id}', 'RaffleController@getRollRaffle');
    Route::post('roll/raffle/{id}', 'RaffleController@postRollRaffle');
    Route::get('roll/group/{id}', 'RaffleController@getRollRaffleGroup');
    Route::post('roll/group/{id}', 'RaffleController@postRollRaffleGroup');
});

// SUBMISSIONS
Route::group(['prefix' => 'submissions', 'middleware' => 'power:manage_submissions'], function () {
    Route::get('/', 'SubmissionController@getSubmissionIndex');
    Route::get('/{status}', 'SubmissionController@getSubmissionIndex')->where('status', 'pending|approved|rejected');
    Route::get('edit/{id}', 'SubmissionController@getSubmission');
    Route::post('edit/{id}/{action}', 'SubmissionController@postSubmission')->where('action', 'approve|reject|cancel');
});

// CLAIMS
Route::group(['prefix' => 'claims', 'middleware' => 'power:manage_submissions'], function () {
    Route::get('/', 'SubmissionController@getClaimIndex');
    Route::get('/{status}', 'SubmissionController@getClaimIndex')->where('status', 'pending|approved|rejected');
    Route::get('edit/{id}', 'SubmissionController@getClaim');
    Route::post('edit/{id}/{action}', 'SubmissionController@postSubmission')->where('action', 'approve|reject|cancel');
});

// SUBMISSIONS
Route::group(['prefix' => 'gallery', 'middleware' => 'power:manage_submissions'], function () {
    Route::get('/submissions', 'GalleryController@getSubmissionIndex');
    Route::get('/submissions/{status}', 'GalleryController@getSubmissionIndex')->where('status', 'pending|accepted|rejected');
    Route::get('/currency', 'GalleryController@getCurrencyIndex');
    Route::get('/currency/{status}', 'GalleryController@getCurrencyIndex')->where('status', 'pending|valued');
    Route::post('edit/{id}/{action}', 'GalleryController@postEditSubmission')->where('action', 'accept|reject|comment|move|value');
});

// REPORTS
Route::group(['prefix' => 'reports', 'middleware' => 'power:manage_reports'], function () {
    Route::get('/', 'ReportController@getReportIndex');
    Route::get('/{status}', 'ReportController@getReportIndex')->where('status', 'pending|assigned|assigned-to-me|closed');
    Route::get('edit/{id}', 'ReportController@getReport');
    Route::post('edit/{id}/{action}', 'ReportController@postReport')->where('action', 'assign|close');
});

// DESIGN APPROVALS
Route::group(['prefix' => 'designs', 'middleware' => 'power:manage_characters'], function () {
    Route::get('edit/{id}/{action}', 'DesignController@getDesignConfirmation')->where('action', 'cancel|approve|reject');
    Route::post('edit/{id}/{action}', 'DesignController@postDesign')->where('action', 'cancel|approve|reject');
    Route::post('vote/{id}/{action}', 'DesignController@postVote')->where('action', 'approve|reject');
});
Route::get('{type}/{status}', 'DesignController@getDesignIndex')->where('type', 'myo-approvals|design-approvals')->where('status', 'pending|approved|rejected');
<<<<<<< HEAD
=======

/***********************************************************************************
 *
 * CLAYMORES
 *
 ***********************************************************************************/

// STATS
Route::group(['prefix' => 'stats', 'namespace' => 'Stats', 'middleware' => 'power:edit_claymores'], function () {
    // GET
    Route::get('/', 'StatController@getIndex');
    Route::get('create', 'StatController@getCreateStat');
    Route::get('edit/{id}', 'StatController@getEditStat');
    Route::get('/delete/{id}', 'StatController@getDeleteStat');
    // POST
    Route::post('create', 'StatController@postCreateEditStat');
    Route::post('edit/{id}', 'StatController@postCreateEditStat');
    Route::post('delete/{id}', 'StatController@postDeleteStat');
});
// LEVELS
Route::group(['prefix' => 'levels', 'namespace' => 'Stats', 'middleware' => 'power:edit_claymores'], function () {
    // GET
    Route::get('{type}', 'LevelController@getLevels')->where('type', 'user|character');
    Route::get('{type}/create', 'LevelController@getCreateLevel')->where('type', 'user|character');
    Route::get('{type}/edit/{id}', 'LevelController@getEditLevel')->where('type', 'user|character');
    Route::get('delete/{id}', 'LevelController@getDeleteLevel');
    // POST
    Route::post('{type}/create', 'LevelController@postCreateEditLevel')->where('type', 'user|character');
    Route::post('{type}/edit/{id}', 'LevelController@postCreateEditLevel')->where('type', 'user|character');
    Route::post('delete/{id}', 'LevelController@postDeleteLevel');
});
// GEARS
Route::group(['prefix' => 'gear', 'namespace' => 'Claymores', 'middleware' => 'power:edit_claymores'], function () {
    Route::get('/', 'GearController@getGearIndex');
    Route::get('/create', 'GearController@getCreateGear');
    Route::post('/create', 'GearController@postCreateEditGear');
    Route::get('/edit/{id}', 'GearController@getEditGear');
    Route::post('/edit/{id}', 'GearController@postCreateEditGear');
    Route::get('delete/{id}', 'GearController@getDeleteGear');
    Route::post('delete/{id}', 'GearController@postDeleteGear');

    Route::post('/stats/{id}', 'GearController@postEditGearStats');

    // categories
    Route::get('gear-categories', 'GearController@getGearCategoryIndex');
    Route::get('gear-categories/create', 'GearController@getCreateGearCategory');
    Route::get('gear-categories/edit/{id}', 'GearController@getEditGearCategory');
    Route::get('gear-categories/delete/{id}', 'GearController@getDeleteGearCategory');
    Route::post('gear-categories/create', 'GearController@postCreateEditGearCategory');
    Route::post('gear-categories/edit/{id?}', 'GearController@postCreateEditGearCategory');
    Route::post('gear-categories/delete/{id}', 'GearController@postDeleteGearCategory');
    Route::post('gear-categories/sort', 'GearController@postSortGearCategory');
});

// WEAPONS
Route::group(['prefix' => 'weapons', 'namespace' => 'Claymores', 'middleware' => 'power:edit_claymores'], function () {
    Route::get('/', 'WeaponController@getWeaponIndex');
    Route::get('/create', 'WeaponController@getCreateWeapon');
    Route::post('/create', 'WeaponController@postCreateEditWeapon');
    Route::get('/edit/{id}', 'WeaponController@getEditWeapon');
    Route::post('/edit/{id}', 'WeaponController@postCreateEditWeapon');
    Route::get('delete/{id}', 'WeaponController@getDeleteWeapon');
    Route::post('delete/{id}', 'WeaponController@postDeleteWeapon');

    Route::post('/stats/{id}', 'WeaponController@postEditWeaponStats');

    // categories
    Route::get('weapon-categories', 'WeaponController@getWeaponCategoryIndex');
    Route::get('weapon-categories/create', 'WeaponController@getCreateWeaponCategory');
    Route::get('weapon-categories/edit/{id}', 'WeaponController@getEditWeaponCategory');
    Route::get('weapon-categories/delete/{id}', 'WeaponController@getDeleteWeaponCategory');
    Route::post('weapon-categories/create', 'WeaponController@postCreateEditWeaponCategory');
    Route::post('weapon-categories/edit/{id?}', 'WeaponController@postCreateEditWeaponCategory');
    Route::post('weapon-categories/delete/{id}', 'WeaponController@postDeleteWeaponCategory');
    Route::post('weapon-categories/sort', 'WeaponController@postSortWeaponCategory');
});

// CHARACTER CLASSES
Route::group(['prefix' => 'character-classes', 'namespace' => 'Claymores', 'middleware' => 'power:edit_claymores'], function () {
    Route::get('/', 'CharacterClassController@getIndex');
    Route::get('create', 'CharacterClassController@getCreateCharacterClass');
    Route::get('edit/{id}', 'CharacterClassController@getEditCharacterClass');
    Route::get('delete/{id}', 'CharacterClassController@getDeleteCharacterClass');
    Route::post('create', 'CharacterClassController@postCreateEditCharacterClass');
    Route::post('edit/{id?}', 'CharacterClassController@postCreateEditCharacterClass');
    Route::post('delete/{id}', 'CharacterClassController@postDeleteCharacterClass');
    Route::post('sort', 'CharacterClassController@postSortCharacterClass');
});

Route::group(['prefix' => 'typing', 'middleware' => 'power:edit_data', 'namespace' => 'Data'], function () {
    Route::post('/', 'ElementController@postTyping');
    Route::get('delete/{id}', 'ElementController@getDeleteTyping');
    Route::post('delete/{id}', 'ElementController@postDeleteTyping');
});
>>>>>>> 0e64f5bf38b88c74c42555e1a3de7429f927474e
