<?php
$xpdo_meta_map['Meetings']= array (
  'package' => 'bbb',
  'version' => '1.1',
  'table' => 'bbb_meeting',
  'extends' => 'xPDOObject',
  'fields' => 
  array (
    'id_meeting' => NULL,
    'name_meeting' => '',
    'id_creator' => 0,
    'date_meeting' => NULL,
    'moderatorPw' => '',
    'attendeePw' => '',
    'welcomeMsg' => '',
    'logoutUrl' => '',
    'maxParticipants' => -1,
    'record' => 0,
    'duration' => 0,
    'dialNumber' => '',
    'voiceBridge' => '',
    'webVoice' => '',
  ),
  'fieldMeta' => 
  array (
    'id_meeting' => 
    array (
      'dbtype' => 'int',
      'attributes' => 'unsigned',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
      'index' => 'pk',
      'generated' => 'native',
    ),
    'name_meeting' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
    ),
    'id_creator' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'date_meeting' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'datetime',
      'null' => false,
    ),
    'moderatorPw' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '40',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
    ),
    'attendeePw' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '40',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
    ),
    'welcomeMsg' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
    ),
    'logoutUrl' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
    ),
    'maxParticipants' => 
    array (
      'dbtype' => 'int',
      'precision' => '3',
      'phptype' => 'integer',
      'null' => true,
      'default' => -1,
    ),
    'record' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'attributes' => 'unsigned',
      'phptype' => 'boolean',
      'null' => false,
      'default' => 0,
    ),
    'duration' => 
    array (
      'dbtype' => 'int',
      'precision' => '3',
      'phptype' => 'integer',
      'null' => true,
      'default' => 0,
    ),
    'dialNumber' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '20',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
    ),
    'voiceBridge' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '20',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
    ),
    'webVoice' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '20',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
    ),
  ),
  'indexes' => 
  array (
    'id_creator' => 
    array (
      'alias' => 'id_creator',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'id_creator' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'primary' => 
    array (
      'alias' => 'primary',
      'primary' => true,
      'unique' => true,
      'columns' => 
      array (
        'id_meeting' => 
        array (
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'date_meeting' => 
    array (
      'alias' => 'date_meeting',
      'primary' => false,
      'unique' => false,
      'columns' => 
      array (
        'date_meeting' => 
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
      'local' => 'id_meeting',
      'foreign' => 'id_meeting',
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
