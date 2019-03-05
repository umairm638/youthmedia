$(document).ready(function () {
    $('#gallerySubmitBtn').click(function () {
        $("#pageSettingsForm").submit();
    });
});

function editRole(roleId) {
    var url = 'getRole';
    var token = $('input[name=_token]').val();
    var data = {roleId: roleId};
    $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': token},
        data: data,
        type: 'POST',
        datatype: 'JSON',
        success: function (resp) {
            $("#editRoleId").val(resp.result[0].roleId);
            $("#editRoleName").val(resp.result[0].name);
        }
    });
}

//delete social media in admin module
function deleteSocial(social_id) {
    var socialId = social_id;
    var url = 'deleteSocial';
    var token = $('input[name=_token]').val();
    var data = {socialId: socialId};
    $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': token},
        data: data,
        type: 'POST',
        datatype: 'JSON',
        success: function (resp) {
            $('#social_row_' + socialId).hide();
        }
    });
}
//edit social media in admin module
function editSocial(social_id) {
    var socialId = social_id;
    var url = 'getSocial';
    var token = $('input[name=_token]').val();
    var data = {socialId: socialId};
    $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': token},
        data: data,
        type: 'POST',
        datatype: 'JSON',
        success: function (resp) {
            $("#socialIdModel").val(socialId);
            $("#socialNameModel").val(resp.result[0].socialName);
            $("#socialLinkModel").val(resp.result[0].socialLink);
            $("#socialIconImage").attr("src", "");
            $("#socialIconImage").attr("src", resp.result[0].socialIcon);
            $("#socialIconImage").removeClass("hide");
            $('#editSocialModel').modal('show');
        }
    });
}

//delete website in websites module
function deleteWebsite(websiteId) {
    var url = 'deleteWebsite';
    var token = $('input[name=_token]').val();
    var data = {websiteId: websiteId};
    $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': token},
        data: data,
        type: 'POST',
        datatype: 'JSON',
        success: function (resp) {
            $('#website_row_' + websiteId).hide();
        }
    });
}

//delete category in category module
function deleteCategory(categoryId) {
    var url = 'deleteCategory';
    var token = $('input[name=_token]').val();
    var data = {categoryId: categoryId};
    $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': token},
        data: data,
        type: 'POST',
        datatype: 'JSON',
        success: function (resp) {
            $('#category_row_' + categoryId).hide();
        }
    });
}

//delete posts in post module
function deletePost(postId) {
    var url = 'deletePost';
    var token = $('input[name=_token]').val();
    var data = {postId: postId};
    $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': token},
        data: data,
        type: 'POST',
        datatype: 'JSON',
        success: function (resp) {
            $('#post_row_' + postId).hide();
        }
    });
}

//update video view on frontend video detail page
function updateVideoView(postId, postViewed) {
    var url = '../updateVideoView';
    var token = $('input[name=_token]').val();
    var data = {postId: postId, postViewed: postViewed};
    $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': token},
        data: data,
        type: 'POST',
        datatype: 'JSON',
        success: function (resp) {

        }
    });
}

//like video on frontend video detail page
function likeVideo(userId, postId) {
    var url = '../updateVideoLikes';
    var token = $('input[name=_token]').val();
    var data = {postId: postId, userId: userId};
    $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': token},
        data: data,
        type: 'POST',
        datatype: 'JSON',
        success: function (resp) {
            if (!resp.alreadyLike) {
                var totalLikes = $('#vidTotalLikes').html();
                $('#vidTotalLikes').html('');
                $('#vidTotalLikes').html(parseInt(totalLikes) + parseInt(1));
                $('#videoLikeSpan').css('color', '#359261');
                $('#videoUnlikeSpan').css('color', '#666666');
                var totalUnLikes = $('#vidTotalUnLikes').html();
                if (totalUnLikes > 0) {
                    $('#vidTotalUnLikes').html('');
                    $('#vidTotalUnLikes').html(parseInt(totalUnLikes) - parseInt(1));
                }
            }
        }
    });
}

//unlike video on frontend video detail page
function unlikeVideo(userId, postId) {
    var url = '../updateVideoUnLikes';
    var token = $('input[name=_token]').val();
    var data = {postId: postId, userId: userId};
    $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': token},
        data: data,
        type: 'POST',
        datatype: 'JSON',
        success: function (resp) {
            if (!resp.alreadyUnLike) {
                var totalUnLikes = $('#vidTotalUnLikes').html();
                $('#vidTotalUnLikes').html('');
                $('#vidTotalUnLikes').html(parseInt(totalUnLikes) + parseInt(1));
                $('#videoUnlikeSpan').css('color', '#ff0000');
                $('#videoLikeSpan').css('color', '#666666');
                var totalLikes = $('#vidTotalLikes').html();
                if (totalLikes > 0) {
                    $('#vidTotalLikes').html('');
                    $('#vidTotalLikes').html(parseInt(totalLikes) - parseInt(1));
                }
            }
        }
    });
}

//set comment parent on frontend video detail page
function setCommentParent(commentId) {
    var parentName = $('#parentName-' + commentId).html();
    $('#replyToPara').removeClass('hide');
    $('#parentUser').html(parentName);
    $('#parent').val(commentId);
}

function cancelReplyComment() {
    $('#replyToPara').addClass('hide');
    $('#parentUser').html('');
    $('#parent').val(0);
}

function reloadPostIframe(post, postId) {
    var html = '<iframe width="100%" height="580" src="' + post + '" frameborder="0" allowfullscreen></iframe>';
    $('.framediv').html('');
    $('#' + postId).html(html);
}

function closeLoginModal() {
    $('#login-info').modal('toggle');
}

//confirm box for delete user video settings page frontend
function confirmDeletePost(postId) {
    $('#deleteUserVideo').val(postId);
}

//delete user video on frontend setting page
function deleteUserPost() {
    var url = 'deleteUserPost';
    var postId = $('#deleteUserVideo').val();
    var token = $('input[name=_token]').val();
    var data = {postId: postId};
    $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': token},
        data: data,
        type: 'POST',
        datatype: 'JSON',
        success: function (resp) {
            if(resp.status) {
                $('#userPost-' + postId).addClass('hide');
            }
        }
    });
}