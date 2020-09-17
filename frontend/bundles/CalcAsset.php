<?php


namespace frontend\bundles;

use yii\web\AssetBundle;

class CalcAsset extends AssetBundle
{
	/**
	 * @inheritdoc
	 */
	public $sourcePath = '@frontend/assets';

    public $css = [
    ];
	/**
	 * @inheritdoc
	 */
	public $js = [
		'js/calc.js'
	];

	public $depends = [
		'yii\web\JqueryAsset',
	];
}