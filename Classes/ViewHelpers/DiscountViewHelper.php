<?php

namespace NITSAN\NsMobile\ViewHelpers;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\Compiler\TemplateCompiler;
use TYPO3Fluid\Fluid\Core\Parser\SyntaxTree\ViewHelperNode;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class DiscountViewHelper extends AbstractTagBasedViewHelper
{
	protected $escapeOutput = false;

	public function initializeArguments()
	{
		$this->registerArgument('price', 'int', 'Discount Price', false, null);
	} 


	/**
	 * using Render function
	 * 
	 */

	public function render()
	{
		$realPrice = $this->arguments['price'] ?? $this->renderChildren();

		//give 10% discount so that we multiplay with (.1).
		$price = \TYPO3\CMS\Core\Utility\MathUtility::calculateWithParentheses(($realPrice * .1));	

		$discount = "Discount price <br> ₹ " . ($realPrice - $price)." | -10% Off  ";
		return $discount;
	}

	/**
	 * Using Render Static method
	 *
	 */

	/* public static function renderStatic(
		array $arguments,
		\Closure $renderChildrenClosure,
		RenderingContextInterface $renderingContext
	) {
		// this is improved with the TagBasedViewHelper (see below)
		$price = $arguments['price'] * .1;

		$discount = "Discount price <br> ₹ " . ($arguments['price'] - $price) . " | -10% Off  ";
		return $discount;
	} */

	/* public function compile(
        $argumentsName,
        $closureName,
        &$initializationPhpCode,
        ViewHelperNode $node,
        TemplateCompiler $compiler
    ) {
		// $price = $argumentsName['price'] * .1;

		// $discount = "Discount price <br> ₹ " . ($argumentsName['price'] - $price) . " | -10% Off  ";
        // return `$discount`;
		return 'strtolower(' . $argumentsName. '[\'price\'])';
    } */

}

//Render()- use if need instance of class 
//Render Static()- static php method , don't use child node using this
