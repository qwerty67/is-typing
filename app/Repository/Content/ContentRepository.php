<?php


namespace App\Repository\Content;


use App\User;
use App\Model\Content;
use Rebing\GraphQL\Support\SelectFields;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Structures\Enumerations\StatusContentEnum;
use App\Structures\Interfaces\Repository\ContentInterface;


class ContentRepository implements ContentInterface, Authenticatable
{

    /**
     * @param $income
     * @return mixed
     * @throws \Exception
     */
    public function addContent($income)
    {

        $content = new Content([
            'subject' => $income['subject'],
            'content' => $income['content'],
            'hashtag' => $income['hashtag'],
            'status' => StatusContentEnum::NEW_CONTENT,
        ]);

        $user = new User();
//
        try {
            /** @var  User $userRelation */
            $user = $user->getUserId();
            $userRelation = User::find($user);
            $userRelation->contentsRelation()->save($content);
        } catch (\Exception $exception) {

            throw new \Exception('can not insert to database!!');
        }

        return [
            'result' => 'success',
            'message' => 'Post added!!'
        ];
    }


    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        // TODO: Implement getAuthIdentifierName() method.
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {

    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        // TODO: Implement getAuthPassword() method.
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }

    /**
     * @param $income
     * @param $getSelectFields
     * @return array
     */
    public function getAllContent($income, $getSelectFields)
    {
        /** @var SelectFields $getSelectFields */

        $content = Content::with(array_keys($getSelectFields->getRelations()))
            ->select($getSelectFields->getSelect())
            ->get()
            ->toArray();

        return $content;

    }

    /**
     * @param $date
     * @param $fields
     * @return array
     */
    public function updateStatus($date, $fields)
    {
        /** @var Content $content */
        $content = Content::find($date['id']);

        if ($date['status'] == StatusContentEnum::ACCEPT_CONTENT) {

            $content->status = StatusContentEnum::ACCEPT_CONTENT;

        } elseif ($date['status'] == StatusContentEnum::REJECT_CONTENT) {

            $content->status = StatusContentEnum::REJECT_CONTENT;

        }

        $content->save();

        return [
            'result' => true,
            'message' => 'updated!'
        ];

    }
}