<?php
/*
Template Name: PPC Block Editor Template
*/

get_header();

$block_content = do_blocks( '
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
<!-- wp:post-content /-->
</div>
<!-- /wp:group -->'
);

?>

<div class="body-container">

    <?php echo $block_content; ?>

</div>

<style>
    
    @media screen and (min-width:1024px) {
        .body-container {
            max-width: 70% !important;
            margin-left:auto !important;
            margin-right: auto !important;
        }
    }

    @media screen and (max-width:820px) {
        .page-template-ppc-block .body-container {
            margin:0 30px !important;
        }

        .page-template-ppc-block .body-container section#banner {
            margin-top: 70px;
        }

        .page-template-ppc-block .body-container section .container {
            padding: 0;
        }

        .page-template-ppc-block .body-container section .container .btn {
            margin-bottom:15px !important;
        }
    }


@media screen and (max-width: 820px) {
  /* line 1, ../sass/_locations.scss */
  #wpsl-wrap {
    display: flex;
    flex-wrap: wrap;
  }
}
/* line 8, ../sass/_locations.scss */
#wpsl-wrap .wpsl-mobile .wpsl-search {
  display: flex;
  left: calc(50% - 125px);
  min-width: 250px;
  bottom: 30px;
}
/* line 16, ../sass/_locations.scss */
#wpsl-wrap #wpsl-gmap,
#wpsl-wrap #wpsl-result-list {
  width: 50%;
}
@media screen and (max-width: 820px) {
  /* line 16, ../sass/_locations.scss */
  #wpsl-wrap #wpsl-gmap,
  #wpsl-wrap #wpsl-result-list {
    width: 100%;
    margin: 0 !important;
  }
}
@media screen and (max-width: 600px) {
  /* line 26, ../sass/_locations.scss */
  #wpsl-wrap #wpsl-gmap {
    height: 350px !important;
  }
  /* line 30, ../sass/_locations.scss */
  #wpsl-wrap #wpsl-gmap .wpsl-icon-direction {
    display: none !important;
  }
}

/* line 41, ../sass/_locations.scss */
#wpsl-result-list #wpsl-stores li {
  list-style: none !important;
  background: #e9eaf0;
  display: block;
  text-align: center;
  padding: 40px 0 30px;
  transition: .3s ease all;
  position: relative;
}
/* line 50, ../sass/_locations.scss */
#wpsl-result-list #wpsl-stores li a {
  padding: 3px 6px;
  margin-left: -3px;
}
/* line 55, ../sass/_locations.scss */
#wpsl-result-list #wpsl-stores li:hover {
  background: white !important;
  box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
  z-index: 5;
}
/* line 60, ../sass/_locations.scss */
#wpsl-result-list #wpsl-stores li:hover a {
  background-position: 0% 0;
  padding: 3px 6px;
  width: -webkit-max-content;
  width: -moz-max-content;
  width: max-content;
  background-size: 201% auto;
  background-color: transparent;
  background-image: linear-gradient(to right, transparent 50%, #DBFF76 50%);
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-delay: 0s;
  animation-delay: 0s;
  -webkit-animation-iteration-count: 1;
  animation-iteration-count: 1;
  -webkit-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
  margin-left: -3px;
  color: inherit;
  background-position: -100% 0;
}
/* line 82, ../sass/_locations.scss */
#wpsl-result-list #wpsl-stores li:hover::after {
  position: absolute;
  content: "\e913";
  background: #dbff76;
  height: 40px;
  width: 40px;
  top: 25px;
  right: 25px;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  font-family: icomoon;
  color: black;
}
/* line 99, ../sass/_locations.scss */
#wpsl-result-list #wpsl-stores li p {
  font-size: 16px;
  color: black !important;
  line-height: 125% !important;
}
/* line 104, ../sass/_locations.scss */
#wpsl-result-list #wpsl-stores li p span,
#wpsl-result-list #wpsl-stores li p strong {
  font-size: inherit;
  color: inherit;
}
/* line 110, ../sass/_locations.scss */
#wpsl-result-list #wpsl-stores li p strong {
  font-size: 20px !important;
  font-weight: 700;
  color: black !important;
  margin-bottom: 10px !important;
  display: block;
}

/* line 122, ../sass/_locations.scss */
#wpsl-direction-details {
  background: white;
  padding: 40px 50px;
  box-sizing: border-box;
}
/* line 127, ../sass/_locations.scss */
#wpsl-direction-details ul {
  list-style: none;
  margin: 0;
  padding: 0;
  font-size: 16px;
}
/* line 133, ../sass/_locations.scss */
#wpsl-direction-details ul li {
  padding: 5px 10px 5px 30px;
  border-bottom: 1px dotted #ccc;
  margin-left: 0;
  overflow: hidden;
  list-style: none outside none !important;
  text-indent: 0;
}
/* line 143, ../sass/_locations.scss */
#wpsl-direction-details .wpsl-back {
  display: inline-block;
  font-size: 16px;
  font-weight: bold;
  color: black !important;
  text-transform: uppercase;
  text-decoration: underline;
  padding: 5px;
  background: #dbff76;
  line-height: 100%;
}

/* line 156, ../sass/_locations.scss */
input#wpsl-search-input {
  border: none;
  text-align: center;
}
/* line 160, ../sass/_locations.scss */
input#wpsl-search-input::-webkit-input-placeholder {
  font-size: 15px;
}
/* line 164, ../sass/_locations.scss */
input#wpsl-search-input::-moz-placeholder {
  font-size: 15px;
}
/* line 168, ../sass/_locations.scss */
input#wpsl-search-input:-ms-input-placeholder {
  font-size: 15px;
}
/* line 172, ../sass/_locations.scss */
input#wpsl-search-input::-ms-input-placeholder {
  font-size: 15px;
}
/* line 176, ../sass/_locations.scss */
input#wpsl-search-input::placeholder {
  font-size: 15px;
}

/* line 181, ../sass/_locations.scss */
.wpsl-search {
  margin-bottom: 0;
  padding: 8px;
  background: white;
  position: absolute;
  z-index: 5;
  display: flex;
  left: 57%;
  justify-content: space-between;
  align-items: center;
  margin-top: 10px;
  box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
}
@media screen and (max-width: 600px) {
  /* line 181, ../sass/_locations.scss */
  .wpsl-search {
    position: absolute;
    left: 5%;
    top: 260px;
    min-width: 90%;
    box-sizing: border-box;
  }
}

@media screen and (max-width: 600px) {
  /* line 204, ../sass/_locations.scss */
  #wpsl-search-wrap form {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
}
/* line 212, ../sass/_locations.scss */
#wpsl-search-wrap .wpsl-input {
  position: relative;
  margin-bottom: 0;
  z-index: 2;
}
/* line 217, ../sass/_locations.scss */
#wpsl-search-wrap .wpsl-input label {
  display: none;
}
/* line 222, ../sass/_locations.scss */
#wpsl-search-wrap .wpsl-search-btn-wrap {
  position: relative;
  z-index: 5;
}
@media screen and (max-width: 600px) {
  /* line 222, ../sass/_locations.scss */
  #wpsl-search-wrap .wpsl-search-btn-wrap {
    margin-top: 7px;
  }
}
/* line 230, ../sass/_locations.scss */
#wpsl-search-wrap .wpsl-search-btn-wrap::before {
  position: absolute;
  content: "\e905";
  z-index: 5;
  color: #000;
  font-family: "Icomoon";
  line-height: 0;
  top: 21px;
  font-size: 16px !important;
  left: 11px;
}
/* line 242, ../sass/_locations.scss */
#wpsl-search-wrap .wpsl-search-btn-wrap #wpsl-search-btn {
  border: none;
  border-radius: 50%;
  height: 40px;
  width: 40px;
  text-indent: -9999px;
  background: #dbff76;
  position: relative;
  margin-right: 5px;
}

/* line 255, ../sass/_locations.scss */
#wpsl-search-wrap div {
  margin-right: 0;
  float: left;
  position: absolute;
  right: 0;
}

/* line 265, ../sass/_locations.scss */
#wpsl-result-list #wpsl-stores li span {
  color: white;
}

.listing-links {
    display: flex;
    margin: 0 auto;
    width: 100%;
    text-align: center;
    justify-content: center;
}

.listing-links a {
    font-size: 16px;
    font-weight: bold;
}

</style>

<?php get_footer(); ?>