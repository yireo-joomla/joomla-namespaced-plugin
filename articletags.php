<?php
/**
 *
 */

defined('_JEXEC') or die('Restricted access');

jimport('joomla.plugin.plugin');

/**
 * Class PlgSystemArticleTags
 */
class PlgSystemArticleTags extends JPlugin
{
	/**
	 * @var JApplicationCms
	 */
	protected $app;

	/**
	 * Event onAfterRender
	 */
	public function onAfterRender()
	{
		$this->includeLibraries();
		$body = $this->app->getBody();

		//return;
		$body = $this->replaceTag($body);
		$this->app->setBody($body);
	}

	/**
	 * @param string $string
	 *
	 * @return string mixed
	 */
	private function replaceTag($string)
	{
		$tagHandler = new Yireo\Utilities\TagHandler;
		$tagHandler->setText($string);

		try
		{
			$article    = $this->getArticle($this->getArticleId());
			$string = $tagHandler->replace('article.title', $article->getTitle());
		}
		catch (Exception $e)
		{
			$string = $tagHandler->replace('article.title', $e->getMessage());
		}

		return $string;
	}

	/**
	 * @param integer $articleId
	 *
	 * @return Yireo\Entity\Article
	 */
	private function getArticle($articleId)
	{
		$article = new Yireo\Entity\Article($this->getDbo());
		$article->load($articleId);

		return $article;
	}

	/**
	 * @return integer
	 */
	private function getArticleId()
	{
		$articleId = (int) $this->params->get('article_id');

		if (empty($articleId))
		{
			throw new Exception('Empty article ID');
		}

		return $articleId;
	}

	/**
	 * @return Yireo\Database\DatabaseInterface
	 */
	private function getDbo()
	{
		return new Yireo\Database\DatabaseProxy(JFactory::getDbo());
	}

	/**
	 * Include libraries (by lack of using composer autoloading)
	 */
	private function includeLibraries()
	{
		require_once 'lib/Yireo/Utilities/TagHandler.php';
		require_once 'lib/Yireo/Entity/Article.php';
		require_once 'lib/Yireo/Database/DatabaseInterface.php';
		require_once 'lib/Yireo/Database/DatabaseProxy.php';
	}
}