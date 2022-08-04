$('#input-form').on('submit',function(e){
    e.preventDefault();
    let _token=$('input[name=_token]').val();
    let keyword=$('#keyword').val();
    let page=$('#page').val()||1;
    let perPage=$('#per-page').val()||20;
    let language=$('#language').val();
    let date=$('#date').val()||"2019-09-10";
    let order=$('#order').val();
    $.ajax({
        url:"/get-data",
        type:'POST',
        data:{
            _token:_token,
            keyword:keyword,
            page:page,
            perPage:perPage,
            language:language,
            date:date,
            order:order
        },
        success:function(response){
            if(response){
                $('.total-count span').html(response['total_count']);
                $('.per-page span').html(response['items'].length);
                $('.current-page span').html(page);
                let items=response['items'];
                $('.container .row').html('');

                items.forEach(item => {    
                    let date=getFullDate(item['created_at']);

                    $('.container .row').append(`
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 py-3">
                        <div class="card text-center" style="width: 17rem;height:30rem">
                            <img src="${item['owner']['avatar_url']}" class="card-img-top" alt="owner-pic">
                            <div class="card-body d-flex flex-column align-items-center">
                                <h6 class="card-title fw-bolder">${item['name']}</h6>
                                <p class="card-text mb-1 text-danger">${item['language']}</p>
                                <p class="m-auto h-50 text-muted">${item['full_name']}</p>
                                <p class="m-0 text-success">${date}</p>
                            </div>
                        </div>
                    </div>
                                            `);
                });
            }
            else{
                console.log('No response');
            }
        }
        
    });
});
// Add Post with ajax
$('#add-post').on('submit',function(e){
    e.preventDefault();
    let _token=$('input[name=_token]').val();
    let title=$('#add-title').val();
    let content=$('#add-content').val();
    $.ajax({
        url:"/post/add",
        type:'post',
        data:{
            _token:_token,
            title:title,
            content:content
        },
        success:function(response){
            if(response){
                $('#table tbody').append(`<tr id="${response.id}">
                                            <td><input type="checkbox" name="idPost" value="${response.id}"></td>
                                            <td>${response.id}</td>
                                            <td>${response.title}</td>
                                            <td>${response.content}</td>
                                            <td>${response.user_id}</td>
                                            <td><a href="#editModal" class="btn btn-primary rounded-0" data-toggle="modal" data-target="#editModal">Edit</a></td>
                                            <td><a href="" class="btn btn-danger rounded-0">Delete</a></td>
                                          </tr>`);
                $('#add-post')[0].reset();
                $('#addModal').modal('toggle');
            }
        }
    });
});

// Edit post 
$('#edit-post').on('submit',function(e){
    e.preventDefault();
    let _token=$('input[name=_token]').val();
    let id=$('#edit-id').val();
    let title=$('#edit-title').val();
    let content=$('#edit-content').val();
    $.ajax({
        url: `/post/edit/${id}`,
        type:'PUT',
        data:{
            _token:_token,
            id:id,
            title:title,
            content:content
        },
        success:function(response){
            if(response){
                $('#table tbody #'+id+' td:nth(1)').html(response.id);
                $('#table tbody #'+id+' td:nth(2)').html(response.title);
                $('#table tbody #'+id+' td:nth(3)').html(response.content);
                $('#editModal').modal('toggle');
                }
            }
    });
});

// Delete Post
function deletePost(id){
    if(confirm("Are You want to delete the post number "+id)){
        $.ajax({
            url:`/post/delete/${id}`,
            type:'DELETE',
            data:{
                _token:$('input[name=_token]').val(),
            },
            success:function(response){
                if(response){
                    $('#table tbody #'+id).remove();
                }
            }
        });
    }
}

//Customize date to show in humany way
function getFullDate(created_at){
    let fullDate=new Date(created_at);
    let day=( (fullDate.getDate() ).toString().length==2)?fullDate.getDate():"0"+fullDate.getDate();
    let month=( (fullDate.getMonth() ).toString().length==2)?fullDate.getMonth():"0"+fullDate.getMonth();
    let date=fullDate.getFullYear()+" : "+month+" : "+day;
    return date;
}

// Get Post Data with Ajax 
function editPost(id){
    $.get(`/post/edit/${id}`,function(post){
        $('#edit-id').val(post.id);
        $('#edit-title').val(post.title);
        $('#edit-content').val(post.content);
    })
}

// Delete Multiple Record using ajax 
// make all records checked 
$('#idAll').click(function(){
    let checkBoxes=$("input:checkbox[name=idPost]")
    checkBoxes.prop("checked",!checkBoxes.prop("checked"));
});
//Delete checked records by sending all IDs to controller function throw ajax 
$('#deleteSelected').on('click',function(){
    let allSelectedIDs=[];
    let checkedInput=$('input:checkbox[name=idPost]:checked');
    checkedInput.each(element=> {
        let checkedInputValue=checkedInput[element].value;
        allSelectedIDs.push(checkedInputValue);
    }); 
    $.ajax({
        url:"/post/delete-selected",
        type:"DELETE",
        data:{
            _token:$('input[name=_token]').val(),
            allSelectedIDs:allSelectedIDs
        },
        success:function(response){
            if(response){
                allSelectedIDs.forEach(element=>{
                    $('#table tbody #'+element).remove();
                });
            }
            
        }
    });
})
