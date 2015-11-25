<?php
$xpdo_meta_map['Clients']= array (
  'package' => 'bbb',
  'version' => '1.1',
  'table' => 'bbb_client',
  'extends' => 'xPDOObject',
  'fields' => 
  array (
    'id_client' => NULL,
    'id_modxuser' => 0,
    'id_creator' => 0,
    'firstname' => '',
    'lastname' => '',
    'email' => '',
    'birthdate' => '0000-00-00 00:00:00',
    'phone' => '',
    'mobilephone' => '',
    'gender' => 0,
    'address' => '',
    'photo' => '',
    'comment' => '',
    'website' => '',
    'extended' => NULL,
  ),
  'fieldMeta' => 
  array (
    'id_client' => 
    array (
      'dbtype' => 'int',
      'attributes' => 'unsigned',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
      'index' => 'pk',
      'generated' => 'native',
    ),
    'id_modxuser' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'null' => true,
      'default' => 0,
    ),
    'id_creator' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'firstname' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'lastname' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'email' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'birthdate' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'datetime',
      'null' => false,
      'default' => '0000-00-00 00:00:00',
    ),
    'phone' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'mobilephone' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'gender' => 
    array (
      'dbtype' => 'int',
      'precision' => '1',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'address' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'photo' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'comment' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'website' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'extended' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'json',
      'null' => true,
      'index' => 'fulltext',
      'indexgrp' => 'extended',
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
        'id_client' => 
        array (
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'lastname' => 
    array (
      'alias' => 'lastname',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'lastname' => 
        array (
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'email' => 
    array (
      'alias' => 'email',
      'primary' => false,
      'unique' => true,
      'type' => 'BTREE',
      'columns' => 
      array (
        'email' => 
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
      'local' => 'id_client',
      'foreign' => 'id_client',
      'cardinality' => 'many',
      'owner' => 'local',
    ),
  ),
  'aggregates' => 
  array (
    'User' => 
    array (
      'class' => 'modUser',
      'local' => 'id_creator',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
  ),
);
