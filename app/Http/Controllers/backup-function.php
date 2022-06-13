public function comment($uuid)
    {
        $checkComment = Comment::where('company_id',$uuid)->first();
        if($checkComment)
        {
        $oldcom = Comment::where('company_id',$uuid)->first();
        $comment = Company::where('uuid',$uuid)->first();
        return view("vendor.add-comment",compact("comment","oldcom"));
        }
        else
        {
            $checkComment = Comment::where('company_id',$uuid)->first();
            $objComment = new Comment;
            
            $comment = Company::where('uuid',$uuid)->first();
            $objComment->company_id=$comment->uuid;
            $objComment->user_id=$comment->user_id;
            $objComment->comp_name=$comment->company_name;
            $objComment->emp_name=$comment->emp_name;
            $objComment->save();
            return Redirect::back()->with('success', 'User Added Successfully');
        }
      
       
    }