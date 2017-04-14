<?php
/**
 *
 */

namespace Yireo\Utilities;

/**
 * Class TagHandler
 *
 * @package Yireo\Utilities
 */
class TagHandler
{
	/**
	 * @var string
	 */
	private $text = '';

	/**
	 * @var string
	 */
	private $tagBegin;

	/**
	 * @var string
	 */
	private $tagEnd;

	/**
	 * TagHandler constructor.
	 *
	 * @param string $tagBegin
	 * @param string $tagEnd
	 */
	public function __construct($tagBegin = '{', $tagEnd = '}')
	{
		$this->tagBegin = $tagBegin;
		$this->tagEnd = $tagEnd;
	}

	/**
	 * @param string $text
	 */
	public function setText($text)
	{
		$this->text = $text;
	}

	/**
	 * @param string $tag
	 * @param string $replacement
	 *
	 * @return string
	 */
	public function replace($tag, $replacement)
	{
		$tag = $this->tagBegin . $tag . $this->tagEnd;

		return str_replace($tag, $replacement, $this->text);
	}
}