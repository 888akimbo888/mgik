<?php
use yii\grid\GridView;
use yii\data\ArrayDataProvider;

?>

<div id='tables_all'>
    <h2 style='text-align: center;'>Построение:</h2>
    <div id="div_ready" style='max-width:1150px;margin: auto;'>
        <?php
            if (count($mas['ready'])==0){
                echo '<h5 style="text-align:center">Ожидание построения</h5>';
            }
            else
            {
                echo "<h4 style='text-align:center'>Приоритет - ".$mas['min_prior']."</h4>";

                $dataProvider = new ArrayDataProvider([
                    'allModels' => $mas['ready'],	
                    'pagination' => false,				
                ]);
                
                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'rowOptions' =>  ['class'=>'table_tr table_grath_tr table-tr','onclick'=>''],
                    'id' => 'grid_table_create_now',		
                    'tableOptions' => [
                                'class' => 'table table-bordered',
                                'style'=>'width: auto;',
                            ],			
                    'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '<span class="not-set">Не задано</span>',],
                    'summary' => 'Показано <b>{totalCount}</b> строк',
                    'layout' => "{summary}\n{items}\n{pager}",		 
                    'emptyText' => 'Результатов не найдено!',
                    'columns' => [
                       
                            ['label' => 'Код',
                                'attribute' => 'id',
                                'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                
                                'filterInputOptions' => [
                                    'class' => 'form-control', 						
                                ],
                            ],
                            ['label' => 'Группа',
                                'attribute' => 'group',
                                'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                
                                'filterInputOptions' => [
                                    'class' => 'form-control', 						
                                ],
                            ],
                            ['label' => 'Подгруппа',
                                'attribute' => 'partGroup',
                                'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                
                                'filterInputOptions' => [
                                    'class' => 'form-control', 						
                                 ],
                            ],
                            ['label' => 'Дисциплина',
                                'attribute' => 'Disciplina',
                                'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                
                                'filterInputOptions' => [
                                    'class' => 'form-control', 						
                                ],
                            ],
                            ['label' => 'ВидЗанятий',
                                'attribute' => 'VidZanyaty',
                                'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                
                                'filterInputOptions' => [
                                    'class' => 'form-control', 						
                                ],                            
                            ],
                            ['label' => 'Преподаватель',
                                'attribute' => 'Prepod',
                                'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                
                                'filterInputOptions' => [
                                    'class' => 'form-control', 						
                                ],                            
                            ],
                            ['label' => 'Поток',
                                'attribute' => 'numberStream',
                                'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                
                                'filterInputOptions' => [
                                    'class' => 'form-control', 						
                                ],                            
                            ],
                            ['label' => 'Кол-во пар надо',
                                'attribute' => 'count_need',
                                'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                
                                'filterInputOptions' => [
                                    'class' => 'form-control', 						
                                ],                            
                            ],
                            ['label' => 'Кол-во пар стоит',
                                'attribute' => 'count_now',
                                'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                
                                'filterInputOptions' => [
                                    'class' => 'form-control', 						
                                ],                            
                            ],
                            ['label' => 'Пробел',
                                'attribute' => 'space_week',
                                'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                
                                'filterInputOptions' => [
                                    'class' => 'form-control', 						
                                ],                            
                            ],
                            ['label' => 'Приоритет',
                                'attribute' => 'priority',
                                'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                
                                'filterInputOptions' => [
                                    'class' => 'form-control', 						
                                ],                            
                            ],
                            ['label' => 'Ошибка',
                                'attribute' => 'info',
                                'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                
                                'filterInputOptions' => [
                                    'class' => 'form-control', 						
                                ],                            
                            ],


                        ],
                ]);
            }
        ?>
    </div>
       
    
    <div id="div_error" style='max-width:1200px;margin: auto;'>
        <h2 class='error_title_h2' style='text-align: center;'>Ошибки:</h2>
        <?php
            if (count($mas['done'])==0){
                echo '<h5 style="text-align:center">Отсутствуют</h5>';
            }
            else
            {
                foreach ($mas['done'] as $key=> $row){
                  
                    $dataProvider = new ArrayDataProvider([
                        'allModels' => $row,
                        'pagination' => false,						
                    ]);
                    
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'rowOptions' =>  ['class'=>'table_tr table_grath_tr table-tr','onclick'=>''],
                        'id' => 'grid_table_create_error_'.$key,		
                        'tableOptions' => [
                                    'class' => 'table table-bordered',
                                    'style'=>'width: auto;',
                                ],			
                        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '<span class="not-set">Не задано</span>',],
                        'summary' => '',
                        'layout' => "{summary}\n{items}\n{pager}",		 
                        'emptyText' => 'Результатов не найдено!',
                        'columns' => [
                           
                                ['label' => 'Код',
                                    'attribute' => 'id',
                                    'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                    'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                    'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                    
                                    'filterInputOptions' => [
                                        'class' => 'form-control', 						
                                    ],
                                ],
                                ['label' => 'Группа',
                                    'attribute' => 'group',
                                    'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                    'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                    'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                    
                                    'filterInputOptions' => [
                                        'class' => 'form-control', 						
                                    ],
                                ],
                                ['label' => 'Подгруппа',
                                    'attribute' => 'partGroup',
                                    'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                    'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                    'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                    
                                    'filterInputOptions' => [
                                        'class' => 'form-control', 						
                                     ],
                                ],
                                ['label' => 'Дисциплина',
                                    'attribute' => 'Disciplina',
                                    'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                    'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                    'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                    
                                    'filterInputOptions' => [
                                        'class' => 'form-control', 						
                                    ],
                                ],
                                ['label' => 'ВидЗанятий',
                                    'attribute' => 'VidZanyaty',
                                    'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                    'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                    'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                    
                                    'filterInputOptions' => [
                                        'class' => 'form-control', 						
                                    ],                            
                                ],
                                ['label' => 'Преподаватель',
                                    'attribute' => 'Prepod',
                                    'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                    'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                    'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                    
                                    'filterInputOptions' => [
                                        'class' => 'form-control', 						
                                    ],                            
                                ],
                                ['label' => 'Поток',
                                    'attribute' => 'numberStream',
                                    'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                    'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                    'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                    
                                    'filterInputOptions' => [
                                        'class' => 'form-control', 						
                                    ],                            
                                ],
                                ['label' => 'Кол-во пар надо',
                                    'attribute' => 'count_need',
                                    'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                    'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                    'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                    
                                    'filterInputOptions' => [
                                        'class' => 'form-control', 						
                                    ],                            
                                ],
                                ['label' => 'Кол-во пар стоит',
                                    'attribute' => 'count_now',
                                    'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                    'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                    'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                    
                                    'filterInputOptions' => [
                                        'class' => 'form-control', 						
                                    ],                            
                                ],
                                ['label' => 'Пробел',
                                    'attribute' => 'space_week',
                                    'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                    'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                    'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                    
                                    'filterInputOptions' => [
                                        'class' => 'form-control', 						
                                    ],                            
                                ],
                                ['label' => 'Приоритет',
                                    'attribute' => 'priority',
                                    'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                    'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                    'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                    
                                    'filterInputOptions' => [
                                        'class' => 'form-control', 						
                                    ],                            
                                ],
                                ['label' => 'Расписание',
                                            'attribute' => 'rasp',
                                            'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                            'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                            'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                            
                                            'filterInputOptions' => [
                                            'class' => 'form-control', 						
                                        ],
                                        'format' => 'raw',
                                        'value'=>function ($this){
                                            $mas=explode(',',$this['rasp']);
                                            $max=max($mas);

                                            $text="<table>";
                                            $text1="<tr style='border: 1px solid #9a8c8ca3;'>";
                                            $text2="<tr style='border: 1px solid #9a8c8ca3;'>";
                                            $day=1;
                                            foreach ($mas as $row){
                                                switch ($day) {
                                                    case 1:{$text1=$text1."<td style='padding: 0px 2px;'>Пн</td>";break;}
                                                    case 2:{$text1=$text1."<td style='padding: 0px 2px;'>Вт</td>";break;}
                                                    case 3:{$text1=$text1."<td style='padding: 0px 2px;'>Ср</td>";break;}
                                                    case 4:{$text1=$text1."<td style='padding: 0px 2px;'>Чт</td>";break;}
                                                    case 5:{$text1=$text1."<td style='padding: 0px 2px;'>Пт</td>";break;}
                                                    case 6:{$text1=$text1."<td style='padding: 0px 2px;'>Сб</td>";break;}                                                    
                                                }
                                                $text2=$text2."<td style=' background: rgb(48,213,255,".(((100/($max==0 ? 1 : $max))*$row)/100).");'>".$row."</td>";
                                                $day++;
                                            }
                                            $text1=$text1."</tr>";
                                            $text2=$text2."</tr>";
                                            $text=$text.$text1.$text2."</table>";

                                            return $text;
                                        }
                                ],
                                ['label' => 'Ошибка',
                                    'attribute' => 'info',
                                    'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                    'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                    'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                    
                                    'filterInputOptions' => [
                                        'class' => 'form-control', 						
                                    ],                            
                                ],
                                ['label' => 'Статус',
                                    'attribute' => 'status',
                                    'filterOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px'],
                                    'headerOptions' => ['style' => 'text-align:center;font-size: 12px;max-width:250px;'],
                                    'contentOptions' => ['style' => 'text-align:center;font-size: 11px;padding:5px;vertical-align: middle;max-width:250px;white-space: pre-wrap;'],
                                    
                                    'filterInputOptions' => [
                                        'class' => 'form-control', 						
                                    ],      
                                    'format' => 'raw',
                                    'value'=>function ($this){
                                            if ($this['info']!=''){
                                                return "<i class='glyphicon glyphicon-remove' style='color:red'></i>";
                                            }
                                            else 
                                            {
                                                if ($this['status']=='done'){
                                                    return "<i class='	glyphicon glyphicon-ok' style='color:green'></i>";
                                                }	else {
                                                    
                                                        return "<i class='glyphicon glyphicon-pause' style='color:#ffa500'></i>";
                                                        return "<i class='glyphicon glyphicon-remove' style='color:red'></i>";
                                                
                                                }	
                                            }							
                                    }                      
                                ],
    
    
                            ],
                    ]);
                }
               
            }
        ?>
    </div>
</div>
<?php