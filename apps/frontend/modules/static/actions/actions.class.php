<?php

class staticActions extends sfActions {
   public function executeIndex() {
      $this->content = $this->getRequestParameter("content");
         
      $context = $this->getContext();
         
      $this->forward404Unless($this->partialExists($context, $this->content));
   }
      
   protected function partialExists($context, $name) {
      $directory = $context->getModuleDirectory();
                                           
      if (is_readable($directory . DIRECTORY_SEPARATOR ."templates". DIRECTORY_SEPARATOR ."_". $name .".php")) {
         return true;
      } else {
         return false;
      }
   }
}

?>
