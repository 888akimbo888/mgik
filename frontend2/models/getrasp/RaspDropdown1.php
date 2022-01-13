<?php

namespace frontend\models\getrasp;

use Yii;
use yii\base\Model;
use yii\data\ArrayDataProvider;

class RaspDropdown extends Model
{

    public function getPreps($idClient)
    {
        $sql = "SELECT [namePrep], [idPrep] FROM [PrepList] WHERE idClient = " . (int)$idClient;
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    // Получаем формы обучения
    public function getFo($idClient)
    {
        $sql = "SELECT DISTINCT 
            FO.nameFO ,
            FO.idFO
            FROM [AutoRasp].[dbo].[Groups] groups
		    INNER JOIN [AutoRasp].[dbo].[FO] FO ON groups.FO = FO.idFO
            WHERE idClient = " . (int)$idClient . " AND Active = 1";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }
	
	    // Получаем формы обучения
    public function getTp($idClient)
    {
        $sql = "SELECT 
		[type]
		FROM [dbo].[Clients] where id_client = ". (int)$idClient ."";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    // Получаем список факультетов
    public function getFacult($idClient)
    {
        $sql = "SELECT [idFac], 
            [nameFac] 
            FROM [AutoRasp].[dbo].[Faculty] 
            WHERE nameFac != '' 
            AND idClient = " . (int)$idClient ;
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    
    // Получаем список курсов
    public function getKurs($idClient)
    {
        $sql = "SELECT DISTINCT [Kurs]
            FROM [AutoRasp].[dbo].[Groups] 
            WHERE idClient = " . (int)$idClient ;
        $sql .= " AND Active = 1 ORDER BY [Kurs]";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    // Получаем список групп
    public function getGroups($idClient, $idFac, $FO, $idKurs)
    {
		if ($idClient == 71) {
			$sql = "SELECT [nameGroup], 
            [idGroup]
            FROM [192.168.65.11, 1434].[AutoRasp].[dbo].[Groups] 
            WHERE idClient = " . (int)$idClient; 
		} else {
			 $sql = "SELECT [nameGroup], 
            [idGroup]
            FROM [AutoRasp].[dbo].[Groups] 
            WHERE idClient = " . (int)$idClient; 
		}
        
        if ($idFac) $sql .= " AND idFac = " . (int)$idFac;
        if ($FO) $sql .= " AND FO = " . (int)$FO;
        if ($idKurs) $sql .= " AND Kurs = " . (int)$idKurs;
        $sql .= " AND Active = 1 ORDER BY [Kurs]";
        
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    // Получаем расписание группы
    public function getRasp($idClient, $idGroup)
    {
		if ($idClient == 71) {
			$sql = "SELECT rasp.idRasp
            ,rasps.idRasps
            ,nagruzka.Disciplina
            ,prep.namePrep
            ,auditoria.nameAud
            ,discvid.nameDiscVid
            ,rasp.Nedel
            ,rasp.date
            ,rasp.[Day]
            ,rasp.Para
            ,rasp.idGroup
            ,rasp.idDisc
            ,rasp.idDiscVid
            ,rasp.idPrep
            ,rasp.idAud
            ,rasp.Sem
            ,rasp.IdClient
            ,rasp.idRasps
            ,rasp.idStatus
            ,rasp.TimeIn
            ,rasp.TimeOut
            ,rasp.numberStream
            ,rasp.partGroup
            ,rasp.idNagruzka
            ,rasp.date_insert
            ,rasp.date_update
        FROM [192.168.65.11, 1434].[AutoRasp].[dbo].[Rasp] rasp
        INNER JOIN [192.168.65.11, 1434].[AutoRasp].[dbo].[Nagruzka] nagruzka ON rasp.idNagruzka = nagruzka.id 
        LEFT JOIN [192.168.65.11, 1434].[AutoRasp].[dbo].[Rasps] rasps ON rasp.idRasps = rasps.idRasps
        LEFT JOIN [192.168.65.11, 1434].[AutoRasp].[dbo].[PrepList] prep ON rasp.idPrep = prep.idPrep
        LEFT JOIN [192.168.65.11, 1434].[AutoRasp].[dbo].[Auditoria] auditoria ON rasp.idAud = auditoria.idAud
        LEFT JOIN [192.168.65.11, 1434].[AutoRasp].[dbo].[DisciplineVid] discvid ON rasp.idDiscVid = discvid.idDiscVid
        WHERE rasp.idClient = " . (int)$idClient . " 
        AND rasp.date >= '" . date('Y-m-d 00:00:00', strtotime('monday this week')) ."'";
		//echo $sql;
		} else {
			$sql = "SELECT rasp.idRasp
            ,rasps.idRasps
            ,nagruzka.Disciplina
            ,prep.namePrep
            ,auditoria.nameAud
            ,discvid.nameDiscVid
            ,rasp.Nedel
            ,rasp.date
            ,rasp.[Day]
            ,rasp.Para
            ,rasp.idGroup
            ,rasp.idDisc
            ,rasp.idDiscVid
            ,rasp.idPrep
            ,rasp.idAud
            ,rasp.Sem
            ,rasp.IdClient
            ,rasp.idRasps
            ,rasp.idStatus
            ,rasp.TimeIn
            ,rasp.TimeOut
            ,rasp.numberStream
            ,rasp.partGroup
            ,rasp.idNagruzka
            ,rasp.date_insert
            ,rasp.date_update
        FROM [AutoRasp].[dbo].[Rasp] rasp
        INNER JOIN [AutoRasp].[dbo].[Nagruzka] nagruzka ON rasp.idNagruzka = nagruzka.id 
        LEFT JOIN [AutoRasp].[dbo].[Rasps] rasps ON rasp.idRasps = rasps.idRasps
        LEFT JOIN [AutoRasp].[dbo].[PrepList] prep ON rasp.idPrep = prep.idPrep
        LEFT JOIN [AutoRasp].[dbo].[Auditoria] auditoria ON rasp.idAud = auditoria.idAud
        LEFT JOIN [AutoRasp].[dbo].[DisciplineVid] discvid ON rasp.idDiscVid = discvid.idDiscVid
        WHERE rasp.idClient = " . (int)$idClient . " 
        AND rasp.date >= '" . date('Y-m-d 00:00:00', strtotime('monday this week')) ."'";
			
		}
        
        if ($idGroup == 471){
            $sql .= " AND rasp.idRasps = 159 AND rasp.idGroup = 2765 ";
        } else {
            $sql .= " AND rasp.idGroup = " . (int)$idGroup . " AND rasp.idRasps = rasps.idRasps AND rasps.isActive = 1";
        };
        $sql .= " ORDER BY rasp.date, rasp.Para";
       /// echo $sql;
       // die();

        return Yii::$app->db->createCommand($sql)->queryAll();
    } 

}     
     
        
        
        
        
        