<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Insert_fixtures extends CI_Migration {

  public function up()
  {
    $this->load->model('Videos_model', 'vm');
    //saveVideo($videoid, $title, $tweet, $userid =0)
    $this->vm->saveVideo("z-NnLhkoSSA", "Sensation White 2011", "This is Sensation White 2011 #techno #djsetlive", 0);
    $this->vm->saveVideo("WzMd8VOS0iA", "Tomorrowland 2012", "Tomorrowland 2012 july 27 28 29 #techno #djsetlive", 0);
    $this->vm->saveVideo("9f347m914gY", "Matinée @ Amnesia Ibiza 2012", "#ibiza #techno", 0);
    $this->vm->saveVideo("Yub-7ICArIg", "Sensation White 2012", "Sensation White 2012 #techno #sensationwhite", 0);
  }

  public function down()
  {
    
  }
}