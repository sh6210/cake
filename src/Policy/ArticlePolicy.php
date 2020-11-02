<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Article;
use Authorization\IdentityInterface;
use phpDocumentor\Reflection\Types\This;

/**
 * Article policy
 */
class ArticlePolicy
{
    /**
     * Check if $user can create Article
     *
     * @param IdentityInterface $user The user.
     * @param Article $article
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Article $article)
    {
        return true;
    }

    /**
     * Check if $user can update Article
     *
     * @param IdentityInterface $user The user.
     * @param Article $article
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Article $article)
    {
        return $this->isAuthor($user, $article);
    }

    /**
     * Check if $user can delete Article
     *
     * @param IdentityInterface $user The user.
     * @param Article $article
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Article $article)
    {
        return $this->isAuthor($user, $article);
    }

    /**
     * Check if $user can view Article
     *
     * @param IdentityInterface $user The user.
     * @param Article $article
     * @return bool
     */
    public function canView(IdentityInterface $user, Article $article)
    {
    }

    protected function isAuthor(IdentityInterface $user, Article $article)
    {
        return $article->user_id === $user->getIdentifier();
    }
}
