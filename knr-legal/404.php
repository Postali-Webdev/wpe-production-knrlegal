<?php
/**
 * 404 Page Not Found.
 *
 * @package KNR Legal
 * @author Postali LLC
 */

get_header(); ?>

<div class="body-container">

    <section class="error-404">
        <div class="container">
            <div class="columns">
                <div class="column-66 centered center">
                    <div class="error">
                        <div class="first-4">4</div>
                        <img src="/wp-content/uploads/2022/10/404-tire.gif" title="404 - Not Found">
                        <div class="last-4">4</div>
                    </div>
                    <h3>The page you’re trying to visit has either been removed or doesn’t exist.</h3>
                    <a href="/" class="btn green bordered rounded"><span class="icon-arrow-left"></span> &nbsp; Back to Home Page</a>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer();
