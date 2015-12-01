<?php
$xpdo_meta_map['ActionTypes']= array (
  'package' => 'bbb',
  'version' => '1.1',
  'table' => 'bbb_actiontypes',
  'extends' => 'xPDOObject',
  'fields' => 
  array (
    'id' => NULL,
    'name' => '',
  ),
  'fieldMeta' => 
  array (
    'id' => 
    array (
      'dbtype' => 'int',
      'attributes' => 'unsigned',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
      'index' => 'pk',
      'generated' => 'native',
    ),
    'name' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
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
        'id' => 
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
      'local' => 'id',
      'foreign' => 'id_actiontype',
      'cardinality' => 'many',
      'owner' => 'local',
    ),
  ),
);
