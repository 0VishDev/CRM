<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\User;
class SearchController extends Controller
{
public function index()
{
$user=User::where('is_admin',2)->paginate(6);
return view('admin.all-users',compact('user'));
}
public function search(Request $request)
{
if($request->ajax())
{
$output="";
$products=DB::table('users')->where('name','LIKE','%'.$request->search."%")->get();
//dd("$products");
if($products)
{
foreach ($products as $key => $product) {
$output.='
<tr>
   '.
   '
   <td>'.$product->emp_id.'</td>
   '.
   '
   <td>'.$product->name.'</td>
   '.
   '
   <td>'.$product->email.'</td>
   '.
   '
   <td>'.$product->mobile.'</td>
   '.
   '
   <td>'.$product->rept_mang.'</td>
   '.
   '
   <td>'.$product->dept.'</td>
   '.
   '
   <td>'.$product->doj.'</td>
   '.
   '
   <td>'.$product->dob.'</td>
   '.
   '
   <td>'.$product->desig.'</td>
   '.
   '
</tr>
';
}
return Response($output);
}
}
}
}