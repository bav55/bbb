<?php
$xpdo_meta_map['ActionTypes']= array (
  'package' => 'bbb',
  'version' => '1.1',
  'table' => 'bbb_actiontypes',
  'extends' => 'xPDOObject',
  'fields' => 
  array (
    'id_actiontype' => NULL,
  ),
  'fieldMeta' => 
  array (
    'id_actiontype' => 
    array (
      'dbtype' => 'int',
      'attributes' => 'unsigned',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
      'index' => 'pk',
      'generated' => 'native',
    ),
  ),
  'indexes' => 
  array (
    'primary' => 
    array (
      'alias' => 'primary',
      'primary' => true,
      'unique' => true,
      'columns' => 
      array (
        'id_actiontype' => 
        array (
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
  'composites' => 
  array (
    'Actions' => 
    array (
      'class' => 'Actions',
      'local' => 'id_actiontype',
      'foreign' => 'id_actiontype',
      'cardinality' => 'many',
      'owner' => 'local',
    ),
  ),
);
