<?php

class Model_Comment extends \Orm\Model
{
	protected static $_properties = array(
		"id" => array(
			"label" => "Id",
			"data_type" => "int",
		),
		"article_id" => array(
			"label" => "Article id",
			"data_type" => "int",
			"validation" => array("required", "valid_string" => array(array("numeric"))),
			"form" => array("type" => "hidden"),
		),
		"user_id" => array(
			"label" => "User id",
			"data_type" => "int",
			"validation" => array("required", "valid_string" => array(array("numeric"))),
			"form" => array("type" => "hidden"),
		),
		"body" => array(
			"label" => "Body",
			"data_type" => "text",
			"validation" => array("required"),
			"form" => array("type" => "textarea"),
		),
		"created_at" => array(
			"label" => "Created at",
			"data_type" => "int",
			"form" => array("type" => false),
		),
		"updated_at" => array(
			"label" => "Updated at",
			"data_type" => "int",
			"form" => array("type" => false),
		),
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'property' => 'created_at',
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'property' => 'updated_at',
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'comments';

	protected static $_primary_key = array('id');

	protected static $_has_many = array(
	);

	protected static $_many_many = array(
	);

	protected static $_has_one = array(
	);

	protected static $_belongs_to = array(
		'user' => array(
			'key_from' => 'user_id',
			'model_to' => 'Model_User',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		)
	);

}
