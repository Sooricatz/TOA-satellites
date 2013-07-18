<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version9 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('program_moderator', 'program_moderator_program_id_program_id', array(
             'name' => 'program_moderator_program_id_program_id',
             'local' => 'program_id',
             'foreign' => 'id',
             'foreignTable' => 'program',
             ));
        $this->createForeignKey('program_moderator', 'program_moderator_speaker_id_speaker_id', array(
             'name' => 'program_moderator_speaker_id_speaker_id',
             'local' => 'speaker_id',
             'foreign' => 'id',
             'foreignTable' => 'speaker',
             ));
        $this->addIndex('program_moderator', 'program_moderator_program_id', array(
             'fields' => 
             array(
              0 => 'program_id',
             ),
             ));
        $this->addIndex('program_moderator', 'program_moderator_speaker_id', array(
             'fields' => 
             array(
              0 => 'speaker_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('program_moderator', 'program_moderator_program_id_program_id');
        $this->dropForeignKey('program_moderator', 'program_moderator_speaker_id_speaker_id');
        $this->removeIndex('program_moderator', 'program_moderator_program_id', array(
             'fields' => 
             array(
              0 => 'program_id',
             ),
             ));
        $this->removeIndex('program_moderator', 'program_moderator_speaker_id', array(
             'fields' => 
             array(
              0 => 'speaker_id',
             ),
             ));
    }
}