<?php

function productImagePath($pageCode) {
	$data = array(
		'pageCode' => $pageCode,
	);
	$page = App\NavigationModel::GetPageSettings($data);

	$pageDescription = $page[0]->pageDescription;

	$pageKeywords = $page[0]->pageKeywords;

	$generalSettings = App\GeneralSettingsModel::GetGeneralSettings();
	$socialSettings = App\SocialSettingsModel::GetSocialSettings();

	$navigation = App\NavigationModel::GetNavigation();
	$categories = App\CategoriesModel::GetAllCategories();

	$topUsers = App\UserModel::GetTopUsers();

	$headerNav = array();
	foreach ($navigation as $navigationRow) {
		if ($navigationRow->navLocation == "header" && $navigationRow->isEnable == "1") {
			$headerNav[] = $navigationRow->pageName;

		}
	}
	$data = array(
		'generalSettings' => $generalSettings,
		'socialSettings' => $socialSettings,
		'navigation' => $navigation,
		'headerNav' => $headerNav,
		'pageDescription' => $pageDescription,
		'pageKeywords' => $pageKeywords,
		'categories' => $categories,
		'topUsers' => $topUsers,
	);
	return $data;
}

?>