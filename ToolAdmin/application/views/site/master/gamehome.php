
<div id="divSlideGame">
    <div class='tabbed round'>
        <ul>
            <li><a href="javascript:void(0);" data-rel="slots" data-tab="four">Game Slot</a></li>
            <li><a href="javascript:void(0);" data-rel="gamebai">Game Bài</a></li>
            <li><a href="javascript:void(0);" data-rel="yeuthich">YÊU THÍCH</a></li>
            <li><a href="javascript:void(0);" data-rel="all" class='active'>Tất cả</a></li>
        </ul>
    </div>

    <div style="clear: both;"></div>
    <div id="owl-example" class="owl-carousel">
        <div class="item">
            <a href="#" class="tile scale-anm yeuthich all gamebai btn_icon" id="phom">
                <img width="160" height="160" alt="" src="<?php echo public_url() ?>/site/images/icon/icon_gamephom.png" />
                <span class="btn__badge">HOT</span></a>
            <a href="#" class="tile scale-anm yeuthich all gamebai btn_icon" id="tlmn">
                <img width="160" height="160" alt="" src="<?php echo public_url() ?>/site/images/icon/icongame_tlmn.png" />
                <span class="btn__badge">HOT</span></a>
        </div>
        <div class="item">
            <a href="#" class="tile scale-anm all gamebai btn_icon" id="tlmnsolo">
                <img width="160" height="160" alt="" src="<?php echo public_url() ?>/site/images/icon/icon_gametlmnsolo.png" />
                <span class="btn__badge btn__badge--blue">NEW</span>
            </a>
            <a href="#" class="tile scale-anm all gamebai btn_icon" id="chan">
                <img width="160" height="160" alt="" src="<?php echo public_url() ?>/site/images/icon/icon_gamechan.png" />
                <span class="btn__badge">HOT</span></a>
        </div>
        <div class="item">
            <a href="#" class="tile scale-anm slots all btn_icon game_slot">
                <img width="160" height="160" alt="" src="<?php echo public_url() ?>/site/images/icon/icon_candyslot.png" />
                <span class="btn__badge btn__badge--blue">NEW</span>
            </a>
        </div>
    </div>
    <div style="clear: both;"></div>
    <div style="z-index: 9; position: absolute; width: 100%; height: 150px; bottom: 0;">
        <div id='dynamic_footer'>
            <div id='copyright'>
                <nav class="contact-ix">
                    <ul>
                        <li><a href="#taiapp" class="tai-app ion-social-apple"><i>Tải App</i></a></li>
                        <li><a href="#daily" data-modal-id="popup5" class="ion-ios-home"><i>Đại lý</i></a></li>
                        <li><a href="https://www.facebook.com/ixengdoithuong/?fref=ts" target="_blank" class="ion-social-facebook"><i>Facebook</i></a></li>
                        <li><a href="http://news.ixeng.vn/" class="ion-speakerphone" target="_blank"><i>Tin tức</i></a></li>
                        <li><a href="http://news.ixeng.vn/huong-dan-choi-game/2.html5" target="_blank" class="ion-information-circled"><i>Hướng dẫn</i></a></li>
                        <li><a href="#" class="ion-android-call"><i>Hỗ trợ: 19006117</i></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div id='featured'>
        </div>
        <input  type="hidden" value="" runat="server" id="hdnlogin" name="hdnlogin" />
    </div>
</div>
<script src="<?php echo public_url() ?>/site/js/tabgamehome.js"></script>