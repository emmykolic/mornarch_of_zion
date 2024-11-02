
<div class="row m-2">
    <div class="col-md-6 offset-md-3 col-12">
        <div class="shadow card p-5">
            <h3 class="">Post A Song!</h3><hr>
            <form action="<?=BURL?>videos/action" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="uid" value="<?=BURL?>">
                <div class="mb-3">
                    <label for="name">Name Of The Video <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name_of_video" required>
                </div>
                <div class="mb-3">
                    <label for="">Add Description For The Video <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="video_description" id="editor1" cols="30" rows="10"></textarea>
                </div>
                <div class="mb-3">
                    <label for="name">Add Tags For The Video <span class="text-danger">*</span></label>
                    
                    <!-- Input field for adding tags -->
                    <input type="text" id="tagInput" class="form-control" placeholder="Type a tag and press Enter">
                    
                    <!-- Container to display added tags -->
                    <div id="tagContainer" class="mt-2"></div>

                    <!-- Hidden input field to store tags for form submission -->
                    <input type="hidden" name="tag_video" id="hiddenTagInput" required>
                </div>

                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="bx bx-video"></i></span>
                    <input type="text" name="source" placeholder="Video youtube Link" class="form-control">
                </div>
                <div class="mt-5 text-center">
                    <input type="submit" value="Send" class="btn btn-primary col-6">
                </div>
            </form>
        </div>
    </div>
</div>





<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tagInput = document.getElementById("tagInput");
        const tagContainer = document.getElementById("tagContainer");
        const hiddenTagInput = document.getElementById("hiddenTagInput");
        
        let tags = [];

        // Function to render tags
        function renderTags() {
            tagContainer.innerHTML = ""; // Clear existing tags
            tags.forEach((tag, index) => {
                const tagElement = document.createElement("span");
                tagElement.classList.add("badge", "bg-primary", "me-1");
                tagElement.innerText = tag;
                
                // Click to remove tag
                tagElement.addEventListener("click", function() {
                    tags.splice(index, 1);
                    renderTags();
                    updateHiddenInput();
                });

                tagContainer.appendChild(tagElement);
            });
        }

        // Update hidden input value with tags
        function updateHiddenInput() {
            hiddenTagInput.value = tags.join(",");
        }

        // Add tag on Enter key
        tagInput.addEventListener("keydown", function(event) {
            if (event.key === "Enter" && tagInput.value.trim() !== "") {
                event.preventDefault();
                const tag = tagInput.value.trim();
                
                // Add tag if it doesn’t exist
                if (!tags.includes(tag)) {
                    tags.push(tag);
                    renderTags();
                    updateHiddenInput();
                }
                
                tagInput.value = ""; // Clear the input
            }
        });
    });
</script>
