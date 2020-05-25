<?php /* Template Name: TMP Upload */
get_header();
?>

<section class="uk-section">

<div uk-grid>
  <div class="uk-width-1-1">Upload</div>
  
  <div class="uk-width-1-1">
    
    <div class="js-upload uk-placeholder uk-text-center">
    <span uk-icon="icon: cloud-upload"></span>
    <span class="uk-text-middle">Attach binaries by dropping them here or</span>
    <div uk-form-custom>
        <input type="file" multiple>
        <span class="uk-link">selecting one</span>
    </div>
</div>

<progress id="js-progressbar" class="uk-progress" value="0" max="100" hidden></progress>

<script>

    var bar = document.getElementById('js-progressbar');

    UIkit.upload('.js-upload', {

        url: '<?php echo get_template_directory_uri().'/app/upload.php'?>',
        method: 'POST',
        type: 'POST',
        name: 'file',
        multiple: true,

        beforeSend: function () {
            console.log('beforeSend', arguments);
        },
        beforeAll: function () {
            console.log('beforeAll', arguments);
        },
        load: function () {
            console.log('load', arguments);
        },
        error: function () {
            console.log('error', arguments);
        },
        complete: function () {
            console.log('complete', arguments);
        },

        loadStart: function (e) {
            console.log('loadStart', arguments);

            bar.removeAttribute('hidden');
            bar.max = e.total;
            bar.value = e.loaded;
        },

        progress: function (e) {
            console.log('progress', arguments);

            bar.max = e.total;
            bar.value = e.loaded;
        },

        loadEnd: function (e) {
            console.log('loadEnd', arguments);

            bar.max = e.total;
            bar.value = e.loaded;
        },

        completeAll: function () {
            console.log('completeAll', arguments);

            setTimeout(function () {
                bar.setAttribute('hidden', 'hidden');
            }, 1000);

            alert('Upload Completed');
        }

    });

</script>
  </div>
  
</div>


</section><!-- #primary -->

<section class="uk-section">

<div uk-grid>
  <div class="uk-width-1-1"><h2>Uploaded files</h2> List all - which are uploaded and drag and drop the positions (2nd step)</div>
  <div class="uk-width-1-1 uk-child-width-1-5@m" uk-grid>
    
    <div>
        <div class="uk-card uk-card-default">
            <div class="uk-card-media-top">
                <img src="https://images.unsplash.com/photo-1532541094034-b353b63dcf7d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2700&q=80" alt="">
            </div>
            <div class="uk-card-body">
                <h3 class="uk-card-title">Media Top</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            </div>
        </div>
    </div>
    
    
    
  </div>
</div>
</section><!-- #primary -->



<?php
get_footer();
