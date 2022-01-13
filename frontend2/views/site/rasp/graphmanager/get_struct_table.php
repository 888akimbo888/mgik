<?php
ini_set('display_errors', true);

use yii\db\Command;
function FiltStruct ()
{
			$idGraph = 53;
			$nKurs = 1;
			
			
			//echo "idStruct=".$idStruct." nKurs=".$nKurs;
			
			$sql = "exec AutoRasp.dbo.getStructPHP '".$idGraph."', '".$nKurs."'";
			$fg = Yii::$app->db->createCommand($sql)->queryAll();
			
			 $dataProvider = new ArrayDataProvider([
					'allModels' => $fg,
					'pagination' => [
						'pageSize' => 20,
					],
					'sort' => [
						'attributes' => ['id'],
					],
				]);
			
			<?=GridView::widget([
			'dataProvider' => $dataProvider,
			'filterModel' => $searchModel,
			'id' => 'gridSpec',			
			'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '<span class="not-set">Не задано</span>',],
		'summary' => 'Показано <b>{begin}-{end}</b> из <b>{totalCount}</b> графиков',
		'layout' => "{summary}\n{items}\n{pager}",
		 'rowOptions' =>  ['class'=>'table_grath_tr'],
   
        'columns' => [
           
            ['label' => 'Код',
               'attribute' => 'id',
			   'headerOptions' => ['style' => 'text-align:center;font-size: 12px;'],
			   'contentOptions' => ['style' => 'max-width:50px;white-space: normal;text-align:center;font-size: 11px;'],
			   'filterInputOptions' => [
                'class' => 'form-control', 
                'onkeyup' => 'filterSpec(event)', 
				],
			],
		],
		]);
}
FiltStruct();
?>