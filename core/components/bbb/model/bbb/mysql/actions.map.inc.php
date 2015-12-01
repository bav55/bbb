<?php
$xpdo_meta_map['Actions']= array (
  'package' => 'bbb',
  'version' => '1.1',
  'table' => 'bbb_actions',
  'extends' => 'xPDOObject',
  'fields' => 
  array (
    'id_action' => NULL,
    'id_actiontype' => NULL,
    'id_client' => NULL,
    'id_meeting' => NULL,
    'timestamp_action' => NULL,
    'extended' => NULL,
  ),
  'fieldMeta' => 
  array (
    'id_action' => 
    array (
      'dbtype' => 'int',
      'attributes' => 'unsigned',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
      'index' => 'pk',
      'generated' => 'native',
    ),
    'id_actiontype' => 
    array (
      'dbtype' => 'int',
      'attributes' => 'unsigned',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
    ),
    'id_client' => 
    array (
      'dbtype' => 'int',
      'attributes' => 'unsigned',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
    ),
    'id_meeting' => 
    array (
      'dbtype' => 'int',
      'attributes' => 'unsigned',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
    ),
    'timestamp_action' => 
    array (
      'dbtype' => 'timestamp',
      'phptype' => 'timestamp',
      'null' => false,
      'attributes' => 'DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
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
        'id_action' => 
        array (
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'action_client_key' => 
    array (
      'alias' => 'action_client_key',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'id_action' => 
        array (
          'collation' => 'A',
          'null' => false,
        ),
        'id_client' => 
        array (
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'action_meeting_key' => 
    array (
      'alias' => 'action_meeting_key',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'id_action' => 
        array (
          'collation' => 'A',
          'null' => false,
        ),
        'id_meeting' => 
        array (
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
  'aggregates' => 
  array (
    'Meetings' => 
    array (
      'class' => 'Meetings',
      'local' => 'id_meeting',
      'foreign' => 'id_meeting',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
    'Clients' => 
    array (
      'class' => 'Clients',
      'local' => 'id_client',
      'foreign' => 'id_client',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
    'ActionTypes' => 
    array (
      'class' => 'ActionTypes',
      'local' => 'id_actiontype',
      'foreign' => 'id_actiontype',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
  ),
);
