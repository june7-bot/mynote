<style>
    .june{
        display: flex;
        justify-content: center;
    }
    textarea{
        width: 500px;
        height: 600px;
    }

    #title{
        width: 450px;
    }

</style>

<div class="june">
    <form method="post" action="note">
        <div class="first">
            <label for="title">주제:</label>
            <input type="text" id="title">
        </div>

        <div class="two">
            <textarea required>
            </textarea>
        </div>

        <input type="image" src="/storage/app/public/submit_icon.png" alt="제출버튼" >
    </form>
</div>
