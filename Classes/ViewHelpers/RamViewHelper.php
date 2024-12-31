<?php

namespace NITSAN\NsMobile\ViewHelpers;


use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;


class RamViewHelper extends AbstractTagBasedViewHelper
{

    protected $escapeOutput=false;

    public function initializeArguments()
    {
        $this->registerArgument('ram','string','Ram extends',false,null);
    }

    public function render()
    {
        $ram = $this->arguments['ram'] ?? $this->renderChildren();
       
        if($ram == '4GB' || $ram == '4 GB')
        {
            $extend = " 1GB Memory Extension available";
        }
        elseif($ram == '6GB' || $ram == '6 GB')
        {
            $extend = " 2GB Memory Extension available";
        }
        elseif($ram == '8GB' || $ram == '8 GB')
        {
            $extend = " 3GB Memory Extension available";
        }
        else{
            $extend ="";
        }
        return $extend;
    }
}
