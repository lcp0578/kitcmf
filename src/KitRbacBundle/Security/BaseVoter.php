<?php
namespace KitRbacBundle\Security;

use KitRbacBundle\Entity\Post;
use KitRbacBundle\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authorization\AccessDecisionManagerInterface;

class BaseVoter extends Voter
{
    // these strings are just invented: you can use anything
    const ADD = 'add';
    const VIEW = 'view';
    const EDIT = 'edit';
    const DELETE = 'delete';

    private $decisionManager;
    
    public function __construct(AccessDecisionManagerInterface $decisionManager)
    {
        $this->decisionManager = $decisionManager;
    }
    
    protected function supports($attribute, $subject)
    {
        // if the attribute isn't one we support, return false
//         if (!in_array($attribute, array(self::ADD, self::VIEW, self::EDIT, self::DELETE))) {
//             return false;
//         }

//         // only vote on Post objects inside this voter
//         if (!$subject instanceof Post) {
//             return false;
//         }

        return true;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();
        var_dump($attribute);
        exit();
        if (!$user instanceof User) {
            // the user must be logged in; if not, deny access
            return false;
        }

        // you know $subject is a Post object, thanks to supports
        // 多亏了supports，你知道 $subject 是 Post 对象
        /** @var Post $post */
//         $post = $subject;

//         switch ($attribute) {
//             case self::VIEW:
//                 return $this->canView($post, $user);
//             case self::EDIT:
//                 return $this->canEdit($post, $user);
//         }
        return true;
        throw new \LogicException('This code should not be reached!');
    }

    private function canView(Post $post, User $user)
    {
        // if they can edit, they can view / 若用户能编辑，表明其亦可查看
        if ($this->canEdit($post, $user)) {
            return true;
        }

        // the Post object could have, for example, a method isPrivate()
        // that checks a boolean $private property
        // Post 对象可以拥有，例如，一个用于检查布尔值 $private 属性的 isPrivate() 方法
        return !$post->isPrivate();
    }

    private function canEdit(Post $post, User $user)
    {
        // this assumes that the data object has a getOwner() method
        // to get the entity of the user who owns this data object
        // 这里假设数据对象中有一个 getOwner() 方法用于获取该对象拥有者的 User entity
        return $user === $post->getOwner();
    }
}