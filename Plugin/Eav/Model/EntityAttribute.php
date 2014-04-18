<?php
App::uses('EavAppModel', 'Eav.Model');

class EntityAttribute extends EavAppModel
{
	public $useTable = 'eav_entity_attributes';

	public $belongsTo = array(
		'EntityType' => array(
            'className' => 'Eav.EntityType',
            'foreignKey' => 'entity_type_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Attribute' => array(
            'className' => 'Eav.Attribute',
            'foreignKey' => 'attribute_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
	);
}