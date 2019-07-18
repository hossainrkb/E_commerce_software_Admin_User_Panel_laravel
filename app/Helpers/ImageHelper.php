<?php
namespace App\Helpers;
/**
 *
 */
 use App\Models\User;
 use App\Helpers\GravatarHelper;
class ImageHelper
{
  public static function getUserImage($id){
    $user = User::find($id);
    $avatar_url="";
    if(!is_null($user)){
      if($user->avatar == NULL){
        //Gravatar image ta return korbo
        if( GravatarHelper::validate_gravatar($user->email) ){
          $avatar_url= GravatarHelper::gravatar_image($user->email, 100);
        }
        else{
          //If no gravatar image
          $avatar_url = url('images/defaults/user-demo.png');
        }

      }
      else{
        //Database e ze image ta ache seta return korbo
          $avatar_url = url('images/users/'. $user->avatar);
      }

    }
    else{
    //  return redirect ('/')
    }
return $avatar_url;
  }
}
