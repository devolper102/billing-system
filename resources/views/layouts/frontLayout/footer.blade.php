<!--==============================footer=================================-->
<footer>
    <div class="padding">
        <div class="main">
            <div class="container_12">
                <div class="wrapper">
                    <article class="grid_8">
                        <h4>Contact Form:</h4>
                        <form id="contact-form" method="post">
                            <fieldset>
                                <label><input name="email" value="Email" onBlur="if(this.value=='') this.value='Email'"
                                              onFocus="if(this.value =='Email' ) this.value=''"/></label>
                                <label><input name="subject" value="Subject"
                                              onBlur="if(this.value=='') this.value='Subject'"
                                              onFocus="if(this.value =='Subject' ) this.value=''"/></label>
                                <textarea onBlur="if(this.value=='') this.value='Message'"
                                          onFocus="if(this.value =='Message' ) this.value=''">Message</textarea>
                                <div class="buttons">
                                    <a href="#" onClick="document.getElementById('contact-form').reset()">Clear</a>
                                    <a href="#" onClick="document.getElementById('contact-form').submit()">Send</a>
                                </div>
                            </fieldset>
                        </form>
                    </article>
                    <article class="grid_4">
                        <h4 class="indent-bot">Link to Us:</h4>
                        <ul class="list-services border-bot img-indent-bot">
                            <li><a href="#">Facebook</a></li>
                            <li><a class="item-1" href="#">Twitter</a></li>
                            <li><a class="item-2" href="#">Picassa</a></li>
                            <li><a class="item-3" href="#">You Tube</a></li>
                        </ul>
                        <p class="p1">Copyright &copy; 2011 </p>
                        <p class="p1"><a class="link" target="_blank" href="http://www.html5xcss3.com/" rel="nofollow">Free
                                Html5 Templates</a> by TemplateMonster.com</p>
                        <!-- {%FOOTER_LINK} -->
                    </article>
                </div>
            </div>
        </div>
    </div>
</footer>
