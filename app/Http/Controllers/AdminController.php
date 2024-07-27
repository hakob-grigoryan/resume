<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Posts;
use App\Models\Education;
use App\Models\Skills;
use App\Models\Information;
use App\Models\News;
use App\Models\ImageFlows;
use App\Models\Notification;
use App\Models\Settings;
use App\Http\Requests\User\UserRegistrationRequest;
use App\Http\Requests\User\UserLoginRequest;
use App\Http\Requests\User\AdminDashboardRequest;
use App\Http\Requests\Post\PostRequest;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Http\Requests\Post\PostDeleteRequest;
use App\Http\Requests\Education\EducationRequest;
use App\Http\Requests\Education\EducationUpdateRequest;
use App\Http\Requests\Education\EducationDeleteRequest;
use App\Http\Requests\Skill\SkillRequest;
use App\Http\Requests\Skill\SkillUpdateRequest;
use App\Http\Requests\Skill\SkillDeleteRequest;
use App\Http\Requests\Settings\SettingsRequest;
use App\Http\Requests\Settings\SettingsUpdateRequest;
use App\Http\Requests\Settings\SettingsDeleteRequest;
use App\Http\Requests\Information\InformationRequest;
use App\Http\Requests\Information\InformationUpdateRequest;
use App\Http\Requests\Information\InformationDeleteRequest;
use App\Http\Requests\News\NewsRequest;
use App\Http\Requests\News\NewsUpdateRequest;
use App\Http\Requests\News\NewsDeleteRequest;
use App\Http\Requests\ImageFlow\ImageFlowRequest;
use App\Http\Requests\ImageFlow\ImageFlowUpdateRequest;
use App\Http\Requests\ImageFlow\ImageFlowDeleteRequest;
use App\Http\Services\User\UserService;
use App\Http\Services\Post\PostService;
use App\Http\Services\Education\EducationService;
use App\Http\Services\Information\InformationService;
use App\Http\Services\Statistics\StatisticsService;
use App\Http\Services\ImageFlow\ImageFlowService;
use App\Http\Services\Skill\SkillService;
use App\Http\Services\News\NewsService;
use App\Http\Services\Settings\SettingsService;
use App\Http\Services\ImageStoreGenerator;
use App\Http\Services\RouteService\RedirectOrViewService;
use Illuminate\Support\Facades\Hash;
use App\Http\DTO\User\UserRegistrationDTO;
use App\Http\DTO\User\UserLoginDTO;
use App\Http\DTO\User\UserUpdateDTO;
use App\Http\DTO\Post\CreatePostDTO;
use App\Http\DTO\Post\UpdatePostDTO;
use App\Http\DTO\Skill\CreateSkillDTO;
use App\Http\DTO\Skill\UpdateSkillDTO;
use App\Http\DTO\Education\CreateEducationDTO;
use App\Http\DTO\Education\UpdateEducationDTO;
use App\Http\DTO\News\CreateNewsDTO;
use App\Http\DTO\News\UpdateNewsDTO;
use App\Http\DTO\Information\CreateInformationDTO;
use App\Http\DTO\Information\UpdateInformationDTO;
use App\Http\DTO\Settings\CreateSettingsDTO;
use App\Http\DTO\Settings\UpdateSettingsDTO;
use App\Http\DTO\ImageFlow\CreateImageFlowDTO;
use App\Http\DTO\ImageFlow\UpdateImageFlowDTO;
use App\Http\Enums\LanguageEnum;
use App\Http\Enums\GenderEnum;

class AdminController extends Controller
{
    public function __construct(
        protected UserService $userService,
        protected RedirectOrViewService $routeService,
        protected ImageStoreGenerator $imageGenerator,
        protected PostService $postService,
        protected EducationService $educationService,
        protected SkillService $skillService,
        protected InformationService $informationService,
        protected NewsService $newsService,
        protected SettingsService $settingsService,
        protected StatisticsService $statisticsService,
        protected ImageFlowService $imageFlowService
    ){}

    public function index(AdminDashboardRequest $index)
    {
      $postStatistics = $this->statisticsService->getPostStatistic();
      $notificationStatistics = $this->statisticsService->getNotificationStatistic();
      $tablesStatistics = $this->statisticsService->getDbTablesStatistics();
      $newsStatistics = $this->statisticsService->getNewsStatistics();
      $notif = $this->routeService->getNotification();
      $myImg = $this->routeService->imageFlow();
      $settings = $this->routeService->getSettings();

      return view('admin.index', compact('notif','myImg','settings','postStatistics','notificationStatistics','newsStatistics','tablesStatistics'));
    }

    public function form(AdminDashboardRequest $index)
    {
        $userInfo = $this->routeService->getUser();
        $myImg = $this->routeService->imageFlow();
        $settings = $this->routeService->getSettings();
        $languages = LanguageEnum::values();
        $genders = GenderEnum::values();

        return view('admin.form', compact('userInfo','myImg','settings','languages','genders'));
    }

    public function table(AdminDashboardRequest $index)
    {
      $userInfo = $this->routeService->getUser();
      $notif = $this->routeService->getNotification();
      $settings = $this->routeService->getSettings();

      return view('admin.table', compact('userInfo','notif','settings'));
    }

    public function login()
    {
      return view('login');
    }

    public function register()
    {
      return view('register');
    }

    public function registerSubmit(UserRegistrationRequest $request)
    {
        $userDataDTO = new UserRegistrationDTO(
            $request->name,
            $request->surname,
            $request->email,
            $request->password
        );
        $this->userService->register($userDataDTO);

        return view('login');
    }

    public function loginSubmit(UserLoginRequest $request)
    {
        $userLoginDataDTO = new UserLoginDTO(
            $request->email,
            $request->password
        );
        $this->userService->login($userLoginDataDTO);
        $request->session()->regenerate();

        return redirect()->route('admin.adminDashboard');
    }

    public function logout(Request $request)
    {
       $this->userService->logout($request->session());

       return redirect()->route('login');
   }

  public function updateUser(Request $request)
  {

    $userUpdateDataDTO = new UserUpdateDTO(
        $request->name,
        $request->surname,
        $request->email,
        $request->addres,
        $request->phone,
        $request->age,
        $request->gender,
        $request->languages
    );
      $updateUser = $this->userService->updateUser($userUpdateDataDTO);

      if ($updateUser) {
        return redirect()->back();
      } else {
        return abort(404);
      }
  }

  public function createPost(PostRequest $request)
  {
   $imageName = $this->imageGenerator->createOriginalName($request->image);
   $imagePath = $this->imageGenerator->imageStore($request->image);
      $postDataDTO = new CreatePostDTO(
           $imageName,
           $imagePath,
           $request->links,
           $request->name
      );

       $post = $this->postService->store($postDataDTO);

       if ($post){
            return redirect()->back();
       } else {
            return abort(404);
       }
  }

    public function createEducation(EducationRequest $request)
    {
     $educationDataDTO = new CreateEducationDTO(
        $request->name,
        $request->description,
     );
      $ed = $this->educationService->store($educationDataDTO);
      if($ed){
        return redirect()->back();
      }else{
        return abort(404);
      }

    }

    public function deletePost(PostDeleteRequest $request)
    {
        $post = $this->postService->delete($request->id);

        if($post){
            return redirect()->back();
        }else{
            return abort(404);
        }
    }

    public function updatePost(PostUpdateRequest $request)
    {
      $postData = ['links'=>$request->links, 'name'=>$request->name];

      if($request->hasFile('image')) {
          $imageName = $this->imageGenerator->createOriginalName($request->image);
          $imagePath = $this->imageGenerator->imageStore($request->image);
          $postDataImage = $this->postService->collectData($request->id,$imageName,$imagePath);
          $postData = array_merge($postData,$postDataImage);
      }

        $updateDto = new UpdatePostDto(
            $postData['links'],
            $postData['name'],
            $postData['image_name'] ?? null,
            $postData['image_pate'] ?? null,
            $postData['image_full_path'] ?? null,
        );

        $data = $this->postService->update($updateDto,$request->id);

        if($data){
            return redirect()->back();
        }else{
            return abort(404);
        }
    }

    public function updateEducation(EducationUpdateRequest $request)
    {
         $updateDataDTO = new UpdateEducationDTO(
            $request->name,
            $request->description,
         );
         $ed = $this->educationService->update($updateDataDTO, $request->id);
        if($ed){
             return redirect()->back();
        }else{
            return abort(404);
        }
    }


    public function deleteEducation(EducationDeleteRequest $request)
    {
        $ed = $this->educationService->delete($request->id);
        if($ed){
            return redirect()->back();
        }else{
            return abort(404);
        }

    }

    public function createSkill(SkillRequest $request)
    {
        $imageName = $this->imageGenerator->createOriginalName($request->image);
        $imagePath = $this->imageGenerator->imageStore($request->image);
        $skillDataDTO = new CreateSkillDTO(
            $imageName,
            $imagePath,
            $request->name,
            $request->description
        );

         $skill = $this->skillService->store($skillDataDTO);
        if ($skill) {
            return redirect()->back();
        }else {
            return abort(404);
        }


        return redirect()->back();
    }

    public function updateSkill(SkillUpdateRequest $request)
    {
      $skillData = ['description'=>$request->description, 'name'=>$request->name];

      if($request->hasFile('image')) {
        $imageName = $this->imageGenerator->createOriginalName($request->image);
        $imagePath = $this->imageGenerator->imageStore($request->image);
        $skillDataImage = $this->skillService->collectData($request->id,$imageName,$imagePath);
        $skillData = array_merge($skillData,$skillDataImage);
        }

         $updateDto = new UpdateSkillDto(
            $skillData['description'],
            $skillData['name'],
            $skillData['image_name'] ?? null,
            $skillData['image_path'] ?? null,
            $skillData['image_full_path'] ?? null,
         );


         $data = $this->skillService->update($updateDto,$request->id);
        if($data){
            return redirect()->back();
        }else{
            return abort(404);
        }
    }

    public function deleteSkill(SkillDeleteRequest $request)
    {
      $skill = $this->skillService->delete($request->id);
          if($skill){
               return redirect()->back();
          }else{
               return abort(404);
          }
    }

    public function createInfo(InformationRequest $request)
    {
        $infoDataDTO = new CreateInformationDTO(
            $request->name,
            $request->content,
         );
        $info = $this->informationService->store($infoDataDTO);
        if($info){
            return redirect()->back();
        }else{
            return abort(404);
        }


      return redirect()->back();
    }

    public function updateInfo(InformationUpdateRequest $request)
    {
        $updateDataDTO = new UpdateInformationDTO(
            $request->name,
            $request->content,
        );

         $info = $this->informationService->update($updateDataDTO, $request->id);
         if($info){
            return redirect()->back();
         }else{
            return abort(404);
         }
    }

    public function deleteInfo(InformationDeleteRequest $request)
    {
        $info = $this->informationService->delete($request->id);
        if($info){
            return redirect()->back();
        }else{
            return abort(404);
        }
    }

    public function createNews(NewsRequest $request)
    {
        $newsDataDTO = new CreateNewsDTO(
            $request->content,
         );
        $news = $this->newsService->store($newsDataDTO);
        if($news){
            return redirect()->back();
        }else{
            return abort(404);
        }



    }

    public function updateNews(NewsUpdateRequest $request)
    {
        $updateDataDTO = new UpdateNewsDTO(
            $request->content,
        );
        $news = $this->newsService->update($updateDataDTO, $request->id,);
        if($news){
            return redirect()->back();
        }else{
            return abort(404);
        }

    }

    public function deleteNews(NewsDeleteRequest $request)
    {
        $news = $this->newsService->delete($request->id);
        if($news){
            return redirect()->back();
        }else{
            return abort(404);
        }
    }

    public function createImg(ImageFlowRequest $request)
    {
        $imageName = $this->imageGenerator->createOriginalName($request->image);
        $imagePath = $this->imageGenerator->imageStore($request->image);
        $imageFlowDataDTO = new CreateImageFlowDTO(
            $imageName,
            $imagePath
        );
        $imageFlow = $this->imageFlowService->store($imageFlowDataDTO);

        if($imageFlow){
            return redirect()->back();
        }else{
            return abort(404);
        }
    }

    public function updateImg(ImageFlowUpdateRequest $request)
    {
      if($request->hasFile('image')) {
        $oldImg = Posts::query()->where('id', $request->id)->first();

      if ($oldImg && Storage::exists($oldImg->image_full_path))
      {
        Storage::delete($oldImg->image_full_path);
      }

        $imageName = $this->imageGenerator->createOriginalName($request->image);
        $imagePath = $this->imageGenerator->imageStore($request->image);
        $imgData['image_name'] = $imageName;
        $imgData['image_path'] = basename($imagePath);
        $imgData['image_full_path'] = $imagePath;
        $updateDataDTO = new UpdateImageFlowDTO(
            $imageName,
            $imagePath,
            basename($imagePath),
        );

        $imageFlow = $this->imageFlowService->update($updateDataDTO, $request->id);
      }

      return redirect()->back();
    }

    public function deleteImg(ImageFlowDeleteRequest $request)
    {
        $imageFlow = $this->imageFlowService->delete($request->id);

        if($imageFlow){
            return redirect()->back();
        }else{
            return abort(404);
        }




    }

    public function createSettings(SettingsRequest $request)
    {
        $settingsDataDTO = new CreateSettingsDTODTO(
            $request->tab_1,
            $request->tab_2,
            $request->tab_3,
            $request->tab_4,
            $request->facebook,
            $request->instagram,
            $request->twitter,
            $request->linkedin,
            $request->map_link,
        );
        $settings = $this->settingsService->store($settingsDataDTO);
          if($ed){
            return redirect()->back();
          }else{
            return abort(404);
          }

    }

    public function updateSettings(SettingsUpdateRequest $request)
    {
        $updateDataDTO = new UpdateSettingsDTO(
        $request->tab_1,
        $request->tab_2,
        $request->tab_3,
        $request->tab_4,
        $request->facebook,
        $request->instagram,
        $request->twitter,
        $request->linkedin,
        $request->map_link,
        );
        $settings = $this->settingsService->update($updateDataDTO, $request->id);
        if($settings){
            return redirect()->back();
        }else{
            return abort(404);
        }
    }

    public function deleteSettings(SettingsDeleteRequest $request)
    {
        $settings = $this->settingsService->delete($request->id);
        if($settings){
            return redirect()->back();
        }else{
            return abort(404);
        }
    }

}
