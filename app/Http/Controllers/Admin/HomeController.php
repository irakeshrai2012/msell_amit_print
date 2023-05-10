<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Hash;
use App\Role;
use App\Module;
use App\Models\User;
use App\AccessModule;
use App\Models\Department;
use App\Models\MasterSheet;
use App\Models\Job;
use App\Models\JobAllotment;
use App\Models\Categories;
use Mail;
use Validator;
use DB;
use Auth;
//use Setting;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    


    public function RoleList()
    {

        $roles=Role::where('status','<>','deleted')->get();
        
        return view('admin.roles.role-list',compact('roles'));
    }


    public function departmentList()
    {

        $roles=Department::where('status','<>','deleted')->get();
        
        return view('admin.departments.list',compact('roles'));
    }


    public function departmentAdd()
    {
        $role=New Department;
        return view('admin.departments.add',compact('role'));
    }


    public function AddDepartment(Request $request)
    {
        $role=New Department;
        $role->name=$request->name;
        $role->status=$request->status;
        $role->save();
        return redirect()->back()->with('success','department added successfully');
    }
    public function editDepartment($id)
    {
        $role=Role::find($id);
        $modules=Module::where('status','active')->get();
        $access_modules=AccessModule::where('role_id',$id)->distinct()->pluck('module_id as id')->toArray();
        return view('admin.departments.edit',compact('role','modules','access_modules'));
    }

    public function ModuleList()
    {

        $modules=Module::where('status','<>','deleted')->get();
        return view('admin.modules.module-list',compact('modules'));
    }


    public function ModuleAccessList()
    {

        $modules=AccessModule::where('status','<>','deleted')->where('role_id','<>',0)->get();
        
        return view('admin.permission.access-list',compact('modules'));
    }


    public function RoleAdd()
    {
        $role=New Role;
        $modules=Module::where('status','active')->get();
        return view('admin.roles.add_role',compact('role','modules'));
    }


    public function editRole($id)
    {
        $role=Role::find($id);
        $modules=Module::where('status','active')->get();
        $access_modules=AccessModule::where('role_id',$id)->distinct()->pluck('module_id as id')->toArray();
        return view('admin.roles.edit_role',compact('role','modules','access_modules'));
    }

     public function ModuleAdd()
    {
        $module=New Module;
        return view('admin.modules.add_module',compact('module'));
    }

     public function ModuleAccessAdd()
    {
        $access=New AccessModule;
        $roles=Role::where('status','active')->get();
        $modules=Module::where('status','active')->get();
        return view('admin.permission.add_access',compact('access','roles','modules'));
    }

    public function editModuleAccess($id)
    {
        $access=AccessModule::find($id);
        $roles=Role::where('status','active')->get();
        $modules=Module::where('status','active')->get();
        return view('admin.permission.edit_access',compact('access','roles','modules'));
    }


    public function editModule($id)
    {
        $module=Module::find($id);
        return view('admin.modules.edit_module',compact('module'));
    }


    


    public function AddRole(Request $request)
    {
        
        $arr=[];
        if($request->action){
          foreach($request->action as $key=>$value){
            $arr[]=$key;
            }  
        }
        
        $role=New Role;
        $role->role_name=$request->role_name;
        $role->status=$request->status;
        $role->save();
        $modules=$request->module;
        if($modules){
        foreach($modules as $value){
            $permission=new AccessModule;
            $permission->role_id=$role->id;
            $permission->module_id=$value;
            $permission->action=implode(',',$arr);
            $permission->status='active';
            $permission->save();
        }
      }

        return redirect()->back()->with('flash_success','Role added successfully.');
        
    }


    public function AddModuleAccess(Request $request)
    {
        
        $arr=[];
        if($request->action){
          foreach($request->action as $key=>$value){
            $arr[]=$key;
            }  
        }
        $modules=$request->module;
        if($modules){
        foreach($modules as $value){
            $permission=new AccessModule;
            $permission->role_id=$request->role_id;
            $permission->module_id=$value;
            $permission->action=implode(',',$arr);
            $permission->status='active';
            $permission->save();
        }
      }

        return redirect()->back()->with('flash_success','New Access added successfully.');
        
    }


    public function updateModuleAccess($id,Request $request)
    {
        
        $arr=[];
        if($request->action){
          foreach($request->action as $key=>$value){
            $arr[]=$key;
            }  
        }
        $permission=AccessModule::find($id);
        $permission->role_id=$request->role_id;
        $permission->module_id=$request->module;
        $permission->action=implode(',',$arr);
        $permission->status='active';
        $permission->save();
        return redirect()->back()->with('flash_success','Access updated successfully.');
        
    }


    public function AddModule(Request $request)
    {
        
        $module=New Module;
        $module->page_title=$request->page_title;
        $module->url=$request->url;
        $module->status=$request->status;
        $module->save();
        return redirect()->back()->with('flash_success','Module added successfully.');
        
    }


    public function updateModule($id,Request $request)
    {
        
        $module=Module::find($id);
        $module->page_title=$request->page_title;
        $module->url=$request->url;
        $module->status=$request->status;
        $module->save();
        return redirect()->back()->with('flash_success','Module updated successfully.');
        
    }

    public function deleteModule($id)
    {

        $heading=Module::where('id',$id)->first();
        $heading->status='deleted';
        $heading->save();
        return redirect()->back()->with('flash_success','Module deleted successfully.');
    }

    public function customerList()
    {

        $roles=User::where('type','customer')->get();
        
        return view('admin.customer.list',compact('roles'));
    }


    public function employeeList()
    {

        $users=User::where('type','<>','customer')->get();
        
        return view('admin.employee.list',compact('users'));
    }


     public function employeeAdd()
    {
        $roles = Role::where('status','active')->get();
        $departments = Department::where('status','active')->get();
        return view('admin.employee.add',[
            'roles' => $roles,
            'departments' => $departments,

        ]);
    }

     public function AddEmployee(Request $request)
    {
        //dd($request->all());
        $count=User::where('email',$request->email)->count();
        if($count==0){
        $user=New User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->emp_id=$request->emp_id;
        $user->department=$request->department;
        $user->role=$request->role;
        $user->password=Hash::make($request->password);
        $user->email_token = base64_encode($request->email);
        $user->type=$request->role;
        $user->verified=1;
        $user->status=$request->status;
        $user->save();
        $maildata= [ 
                'name'=>ucfirst($request->name),
                'username'=>$request->email,
                'password'=>$request->password
                ];      
        Mail::to($request->email)->send(new WelcomeEmail($maildata)); 
        return redirect('admin/employee/list')->with('flash_success','Employee added successfully.');
        }
        else{
           return redirect()->back()->with('flash_success','Email already exists.'); 

        }
        
    }

    public function updateEmployee(Request $request,$id)
    {
        //dd($request->all());
        
        $user=User::where('email',$request->email)->first();
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->emp_id=$request->emp_id;
        $user->department=$request->department;
        $user->role=$request->role;
        $user->type=$request->role;
        $user->verified=1;
        $user->status=$request->status;
        $user->save();
        return redirect('admin/employee/list')->with('flash_success','Employee Updated successfully.');
        
        
        
    }


    public function deleteEmployee($id)
    {
        $user=User::where('id',$id)->first();
        $user->status=0;
        $user->delete();
        return redirect('admin/employee/list')->with('flash_success','Customer Deleted successfully.');
        
        
    }

    public function editEmployee($id)
    {
        $user=User::find($id);

        $roles = Role::where('status','active')->get();
        $departments = Department::where('status','active')->get();
        //dd($user);
        return view('admin.employee.edit',compact('user','roles','departments'));
    }


     public function customerAdd()
    {
        $usertypes = [
            'admin' => 'Admin',
            'customer' => 'Customer'
        ];
        return view('admin.customer.add',[
            'usertypes' => $usertypes
        ]);
    }


    public function editCustomer($id)
    {
        $user=User::find($id);
        return view('admin.customer.edit',compact('user'));
    }


    public function addCustomer(Request $request)
    {
        
        $count=User::where('email',$request->email)->count();
        if($count==0){
        $user=New User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->business_name=$request->business_name;
        $user->business_address=$request->business_address;
        $user->gst=$request->gst;
        $user->pan=$request->pan;
        $user->password=Hash::make($request->password);
        $user->email_token = base64_encode($request->email);
        $user->type='customer';
        $user->verified=1;
        $user->status=$request->status;
        $user->save();
        $maildata= [ 
                'name'=>ucfirst($request->name),
                'username'=>$request->email,
                'password'=>$request->password
                ];      
        Mail::to($request->email)->send(new WelcomeEmail($maildata)); 
        return redirect('admin/customers/list')->with('flash_success','Customer added successfully.');
        }
        else{
           return redirect()->back()->with('flash_success','Email already exists.'); 

        }
        
    }


     public function updateCustomer(Request $request,$id)
    {

        $user=User::where('id',$request->id)->first();
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->business_name=$request->business_name;
        $user->business_address=$request->business_address;
        $user->gst=$request->gst;
        $user->pan=$request->pan;
        //$user->password=Hash::make($request->password);
        $user->email_token = base64_encode($request->email);
        $user->type='customer';
        $user->verified=1;
        $user->status=$request->status;
        $user->save();
        return redirect('admin/customers/list')->with('flash_success','Customer Updated successfully.');
        
        
    }


     public function deleteCustomer($id)
    {
        $user=User::where('id',$id)->first();
        $user->status=0;
        $user->delete();
        return redirect('admin/customers/list')->with('flash_success','Customer Deleted successfully.');
        
        
    }

    public function sheetList()
    {

        $sheets=MasterSheet::where('status','<>','deleted')->get();
        
        return view('admin.sheets.list',compact('sheets'));
    }


     public function sheetAdd()
    {

        $categories=Categories::whereNULL('parent')->get();
        return view('admin.sheets.add',compact('categories'));
    }


     public function addSheet(Request $request)
    {
        
       
        $sheet=New MasterSheet;
        $sheet->date=$request->date;
        $sheet->time=$request->time;
        $sheet->sheet_type=$request->sheet_type;
        $sheet->sheet_no=$request->sheet_no;
        $sheet->remark=$request->remark;
        $sheet->status=$request->status;
        $sheet->save();
       
        return redirect('admin/sheets/list')->with('flash_success','Sheets added successfully.');
        
        
    }


    public function editSheet($id)
    {
        $sheet=MasterSheet::find($id);
        $categories=Categories::whereNULL('parent')->get();
        return view('admin.sheets.edit',compact('sheet','categories'));
    }


     public function updateSheet(Request $request,$id)
    {

        $sheet=MasterSheet::where('id',$request->id)->first();
        $sheet->date=$request->date;
        $sheet->time=$request->time;
        $sheet->sheet_type=$request->sheet_type;
        $sheet->sheet_no=$request->sheet_no;
        $sheet->remark=$request->remark;
        $sheet->status=$request->status;
        $sheet->save();
        return redirect('admin/sheets/list')->with('flash_success','Sheets Updated successfully.');
        
        
    }

     public function deleteSheet($id)
        {
            $sheet=MasterSheet::where('id',$id)->first();
            $sheet->status="deleted";
            $sheet->save();
            return redirect('admin/sheets/list')->with('flash_success','Sheets Deleted successfully.');
            
            
        }


    public function jobList()
    {

        $jobs=Job::where('status','<>','deleted')->get();
        
        return view('admin.jobs.list',compact('jobs'));
    }


     public function jobAdd()
    {
        
        return view('admin.jobs.add');
    }


     public function addJob(Request $request)
    {
        
       
        $sheet=New Job;
        $sheet->name=$request->name;
        $sheet->status=$request->status;
        $sheet->save();
       
        return redirect('admin/jobs/list')->with('flash_success','Job added successfully.');
        
        
    }


    public function editJob($id)
    {
        $sheet=Job::find($id);
        return view('admin.jobs.edit',compact('sheet'));
    }


     public function updateJob(Request $request,$id)
    {

        $sheet=Job::where('id',$request->id)->first();
        $sheet->name=$request->name;
        $sheet->status=$request->status;
        $sheet->save();
        return redirect('admin/jobs/list')->with('flash_success','Job Updated successfully.');
        
        
    }

     public function deleteJob($id)
        {
            $sheet=Job::where('id',$id)->first();
            $sheet->status="deleted";
            $sheet->save();
            return redirect('admin/jobs/list')->with('flash_success','Sheets Deleted successfully.');
            
            
        }


     public function jobAllottmentList()
    {

        $jobs=JobAllotment::where('status','<>','deleted')->get();
        
        return view('admin.jobs-allottment.list',compact('jobs'));
    }


     public function jobAllottmentAdd()
    {
        
        return view('admin.jobs.add');
    }


     public function addjobAllottment(Request $request)
    {
        
       
        $sheet=New Job;
        $sheet->name=$request->name;
        $sheet->status=$request->status;
        $sheet->save();
       
        return redirect('admin/jobs-allottment/list')->with('flash_success','Job added successfully.');
        
        
    }


    public function editjobAllottment($id)
    {
        $sheet=Job::find($id);
        return view('admin.jobs.edit',compact('sheet'));
    }


     public function updatejobAllottment(Request $request,$id)
    {

        $sheet=Job::where('id',$request->id)->first();
        $sheet->name=$request->name;
        $sheet->status=$request->status;
        $sheet->save();
        return redirect('admin/jobs-allottment/list')->with('flash_success','Job Updated successfully.');
        
        
    }

     public function deletejobAllottment($id)
        {
            $sheet=Job::where('id',$id)->first();
            $sheet->status="deleted";
            $sheet->save();
            return redirect('admin/jobs-allottment/list')->with('flash_success','Sheets Deleted successfully.');
            
            
        }
        
       
   
    
}