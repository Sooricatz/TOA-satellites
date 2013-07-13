<?php

/**
 * BaseProgramSpeaker
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $program_id
 * @property integer $speaker_id
 * @property Program $Program
 * @property Speaker $Speaker
 * 
 * @method integer        getProgramId()  Returns the current record's "program_id" value
 * @method integer        getSpeakerId()  Returns the current record's "speaker_id" value
 * @method Program        getProgram()    Returns the current record's "Program" value
 * @method Speaker        getSpeaker()    Returns the current record's "Speaker" value
 * @method ProgramSpeaker setProgramId()  Sets the current record's "program_id" value
 * @method ProgramSpeaker setSpeakerId()  Sets the current record's "speaker_id" value
 * @method ProgramSpeaker setProgram()    Sets the current record's "Program" value
 * @method ProgramSpeaker setSpeaker()    Sets the current record's "Speaker" value
 * 
 * @package    toaberlin
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProgramSpeaker extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('program_speaker');
        $this->hasColumn('program_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('speaker_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));

        $this->option('charset', 'UTF8');
        $this->option('type', 'innodb');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Program', array(
             'local' => 'program_id',
             'foreign' => 'id'));

        $this->hasOne('Speaker', array(
             'local' => 'speaker_id',
             'foreign' => 'id'));
    }
}