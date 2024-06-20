<section class="ftco-section ftco-intro bg-danger" style="background-image: url('<?=BURL?>themes/mornarch_landing/images/handshake.jpg'); background-position: center;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-6 heading-section heading-section-white ftco-animate">
                    <h2 class="mb-3">Please fill our partnership form and we will call you back</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog section start -->
    <!-- <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Blog Post Title</h2>
                <p class="card-text text-muted">Posted on May 24, 2024 by Author</p>
            </div>
            <div class="card-body">
                <p class="card-text">This is the content of the blog post. It can contain text, images, videos, and other media elements to convey the message.</p>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <div>
                    <span class="like-btn text-primary"><i class="fas fa-thumbs-up"></i> Like (<span id="like-count">0</span>)</span>
                    <span class="ml-3 comment-btn text-secondary"><i class="fas fa-comments"></i> Comment (<span id="comment-count">0</span>)</span>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Comments</h5>
                <ul class="list-group list-group-flush" id="comment-list">
                     Comments will be inserted here 
                </ul>
                <div class="mt-3">
                    <div class="form-group">
                        <label for="comment-text">Add a comment:</label>
                        <textarea class="form-control" id="comment-text" rows="3"></textarea>
                    </div>
                    <button class="btn btn-primary" id="add-comment-btn">Post Comment</button>
                </div>
            </div>
        </div>
    </div> -->
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Blog Post Title</h5>
                <p class="card-text">This is a sample blog post content. It can be any text or HTML content.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <button class="btn btn-primary like-button">
                        <i class="fa fa-thumbs-up"></i> Like (<span class="like-count">0</span>)
                    </button>
                    <button class="btn btn-secondary comment-button">
                        <i class="fa fa-comments"></i> Comment (<span class="comment-count">0</span>)
                    </button>
                </div>
            </div>
        </div>
        <div class="comment-section mt-3" style="display: none;">
            <div class="card">
                <div class="card-body">
                    <form id="commentForm">
                        <div class="form-group">
                            <label for="comment">Leave a comment:</label>
                            <textarea class="form-control" id="comment" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                    </form>
                    <div class="mt-3">
                        <h5>Comments:</h5>
                        <ul class="list-unstyled comment-list"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog section end -->