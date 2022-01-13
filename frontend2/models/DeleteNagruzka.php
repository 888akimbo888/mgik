<?php
	namespace frontend\models;

	use yii\base\Model;
	use common\models\User;
	use yii\db\ActiveRecord;
	use yii\db\Command;
	use yii\db\Connection;
	use Yii;
	use yii\grid\GridView;
	use yii\data\ActiveDataProvider;
	use yii\db\Query;

	class DeleteNagruzka extends Model {		
		public function DeleteNagruzkaRow($id) {//обновляем группу
			$sql="select numberStream from [AutoRasp].[dbo].[Nagruzka]
			where id = ".(int)$id." ";
			$stream=Yii::$app->db->createCommand($sql)->queryOne()['numberStream']; 
			
			$sqlDeleteNagruzkaRow = "
			delete from
				[AutoRasp].[dbo].[Nagruzka]
			where id = ".(int)$id;	
			
			Yii::$app->db->createCommand($sqlDeleteNagruzkaRow)->execute(); 

			if ($stream!=0){
				$sql="select id from  [AutoRasp].[dbo].[Nagruzka] where numberStream=".$stream;
				$mas=Yii::$app->db->createCommand($sql)->queryAll(); 

				if (count($mas)==0){
					$sql="delete from StreamRows where idStreamRow=".$stream;
					Yii::$app->db->createCommand($sql)->execute(); 
				}
			
			}
		}
		return ;
	}
?>