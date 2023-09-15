<?php

namespace NITSAN\NsMobile\Domain\Validator;
use TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator;

class FeatureValidator extends AbstractValidator {
   protected function isValid(mixed $value): void
   {
       // $value is the title string
       if (str_starts_with('_', $value)) {
           $errorString = 'The discription may not start with an underscore. ';
           $this->addError($errorString, 1297418976);
       }
       if (strlen($value) == 1) {
         $errorString = 'Please enter a Feature ';
         $this->addError($errorString, 1297418976);
     }
   }
}



?>