<?php

/**
 * This is the model class for table "tbl_doc".
 *
 * The followings are the available columns in table 'tbl_doc':
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property string $content
 * @property string $tags
 * @property integer $status
 * @property integer $created
 * @property integer $updated
 * @property integer $author_id
 * @property string $author
 * @property string $hash
 * @property string $key
 * @property string $guid
 * @property string $comment
 */
class Doc extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_doc';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status, created, updated, author_id', 'numerical', 'integerOnly'=>true),
			array('title, url, tags', 'length', 'max'=>255),
			array('author', 'length', 'max'=>120),
			array('hash, guid', 'length', 'max'=>32),
			array('key', 'length', 'max'=>128),
			array('content, comment', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, url, content, tags, status, created, updated, author_id, author, hash, key, guid, comment', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'url' => 'Url',
			'content' => 'Content',
			'tags' => 'Tags',
			'status' => 'Status',
			'created' => 'Created',
			'updated' => 'Updated',
			'author_id' => 'Author',
			'author' => 'Author',
			'hash' => 'Hash',
			'key' => 'Key',
			'guid' => 'Guid',
			'comment' => 'Comment',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('created',$this->created);
		$criteria->compare('updated',$this->updated);
		$criteria->compare('author_id',$this->author_id);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('hash',$this->hash,true);
		$criteria->compare('key',$this->key,true);
		$criteria->compare('guid',$this->guid,true);
		$criteria->compare('comment',$this->comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Doc the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
