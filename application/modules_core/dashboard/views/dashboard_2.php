  <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
  <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>

<script>
  $(function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
 
    $( "#opener" ).click(function() {
      $( "#dialog" ).dialog( "open" );
    });
  });
  </script>
  
 <p id="dialog">This is an animated dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
<div class="centercontent">
    <div id="contentwrapper" class="contentwrapper widgetpage">
        <div class="one_half">
            <div class="widgetbox">
                <div class="title"><h3>Recent Activity</h3></div>
                <div class="widgetoptions">
                    <div class="right">
                        <a href="activity">View All Activity</a>
                    </div>
                    <a href="activity/index/add">Add Activity</a>
                </div>
                <div class="widgetcontent">
                    <ul class="recent_list">
                        <?php               
                        if(count($activity) > 0){
                            foreach($activity as $r){?>
                        <?
                            $kalimat    = $r->note;
                            $id         = $r->id;
                        ?>    
                        
                            <li class="calendar new">
                                <div class="msg">
                                    
                                    <? $user_link = '<a href="/icare/activity/user/'.$r->user_add.'">'.$this->aap_lib->get_employee_name($r->user_add).'</a>';
                                    echo $user_link.' >> '.$this->aap_lib->potong_text($kalimat,50).'... <a id="opener" href="#">Read More</a>';
                                    ?>
                                    
                                </div>
                        <?php 
                            } 
                        }
                        ?>
                </div><!--widgetcontent-->
            </div><!--widgetbox-->
            <div class="widgetbox">
                <div class="title"><h3>Project Activity</h3></div>
                <div class="widgetoptions">
                    <div class="right">
                        <a href="activity/project">View All Activity</a>
                    </div>
                    <a href="activity/project/add">Add Activity</a>
                </div>
                <div class="widgetcontent">
                    <ul class="recent_list">
                        <?php               
                        if(count($project_report) > 0){
                            foreach($project_report as $r){?>
                        <?
                            $kalimat    = $r->note;
                            $id         = $r->id;
                            $id_company = $r->id_mstr_company;
                        ?>    
                            <li class="calendar new">
                                <div class="msg"> 
                                    <? $user_link = '<a href="/icare/activity/project/'.$r->id_mstr_company.'">'.$this->aap_lib->get_company_name($id_company).'</a>';
                                    echo $user_link.' >> '.$this->aap_lib->potong_text($kalimat,50).'... <a href="/icare/activity/index/edit/'.$id.'">Read More</a>';
                                    ?>
                                </div>
                        <?php 
                            } 
                        }
                        ?>
                </div><!--widgetcontent-->
            </div><!--widgetbox-->
            
            
            <div class="widgetbox">
                <div class="title"><h3>Content Slider</h3></div>
                <div class="widgetcontent">
                    <ul id="slidercontent">
                        <li>
                            <div class="slide_wrap">
                                <div class="slide_img"><img src="uploads/foto/no-photo.png" alt="" /></div>
                                <div class="slide_content">
                                    	<h4><a href="#">Why Won't My Cat Eat?</a></h4>
                                        <small>Submitted by: <a href="#"><strong>Hiccup</strong></a> - June 10, 2012</small>
                                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non...</p>
                                        <p><button class="stdbtn btn_lime">Approve</button> <button class="stdbtn">Decline</button></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="slide_wrap">
                                <div class="slide_img"><img src="uploads/foto/no-photo.png" alt="" /></div>
                                <div class="slide_content">
                                    	<h4><a href="#">We Are About Color</a></h4>
                                        <small>Submitted by: <a href="#"><strong>Hiccup</strong></a> - June 10, 2012</small>
                                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non...</p>
                                        <p><button class="stdbtn btn_lime">Approve</button> <button class="stdbtn">Decline</button></p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div><!--widgetcontent-->
            </div><!--widgetbox-->
            <div class="widgetbox">
                <div class="title"><h3>Statements</h3></div>
                <div class="widgetcontent padding0 statement">
                               <table cellpadding="0" cellspacing="0" border="0" class="stdtable">
                                    <colgroup>
                                        <col class="con0" />
                                        <col class="con1" />
                                        <col class="con0" />
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th class="head0">Date</th>
                                            <th class="head1">Sales</th>
                                            <th class="head0">Earnings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01/12/12</td>
                                            <td>10</td>
                                            <td>$250.12</td>
                                        </tr>
                                        <tr>
                                            <td>01/11/12</td>
                                            <td>5</td>
                                            <td>$100.43</td>
                                        </tr>
                                        <tr>
                                            <td>01/10/12</td>
                                            <td>22</td>
                                            <td>$1010.00</td>
                                        </tr>
                                        <tr>
                                            <td>01/09/12</td>
                                            <td>21</td>
                                            <td>$1000.23</td>
                                        </tr>
                                        <tr>
                                            <td>01/08/12</td>
                                            <td>14</td>
                                            <td>$500.22</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!--widgetcontent-->
                        </div><!--widgetbox-->
                        
                        
                        <div class="widgetbox">
                            <div class="title"><h3>Event Calendar</h3></div>
                            <div class="widgetcontent">
                                <div id="datepicker"></div>
                            </div><!--widgetcontent-->
                        </div><!--widgetbox-->
                        
                        
                        <div class="widgetbox">
                            <div class="title"><h3>Widget with Head Buttons</h3></div>
                            <div class="widgetoptions">
                                <div class="right"><a href="#">View All Users</a></div>
                                <a href="#">Add User</a>
                            </div>
                            <div class="widgetcontent userlistwidget nopadding">
                                <ul>
                                    <li>
                                        <div class="avatar"><img src="templates/amanda/images/thumbs/avatar1.png" alt="" /></div>
                                        <div class="info">
                                            <a href="#">Squint</a> <br />
                                            Front-End Engineer <br /> 18 minutes ago
                                        </div><!--info-->
                                    </li>
                                    <li>
                                        <div class="avatar"><img src="templates/amanda/images/thumbs/avatar2.png" alt="" /></div>
                                        <div class="info">
                                            <a href="#">Eunice</a> <br />
                                            Architectural Designer <br /> 18 minutes ago
                                        </div><!--info-->
                                    </li>
                                    <li>
                                        <div class="avatar"><img src="templates/amanda/images/thumbs/avatar1.png" alt="" /></div>
                                        <div class="info">
                                            <a href="#">Captain Gutt</a> <br />
                                            Software Engineer <br /> 18 minutes ago
                                        </div><!--info-->
                                    </li>
                                    <li>
                                        <div class="avatar"><img src="templates/amanda/images/thumbs/avatar2.png" alt="" /></div>
                                        <div class="info">
                                            <a href="#">Flynn</a> <br />
                                            Accounting Manager <br /> 18 minutes ago
                                        </div><!--info-->
                                    </li>
                                </ul>
                                <a href="#" class="more">View More Users</a>
                            </div><!--widgetcontent-->
                        </div><!--widgetbox-->
                            
                    </div><!--one_half-->
                    
                    
                    <div class="one_half last">
                    
                    	<div class="widgetbox">
<script type="text/javascript">

/***********************************************
* Fading Scroller- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

var delay = 2000; //set delay between message change (in miliseconds)
var maxsteps=30; // number of steps to take to change from start color to endcolor
var stepdelay=40; // time in miliseconds of a single step
//**Note: maxsteps*stepdelay will be total time in miliseconds of fading effect
var startcolor= new Array(255,255,255); // start color (red, green, blue)
var endcolor=new Array(0,0,0); // end color (red, green, blue)

var fcontent=new Array();

              begintag='<div style="font: normal 14px Arial; padding: 5px;">'; //set opening tag, such as font declarations
    <?php 
                        $baris = 0;
                        $notes[$baris] = '';                        
        if(count($activity) > 0){
            foreach($activity as $r){?>
              <?
              $kalimat = $this->aap_lib->potong_text($r->note,5);
              ?>
              fcontent[<? echo $baris; ?>]      ="<? echo $r->date.'ini baris ke -'.$baris.' + '.$this->aap_lib->get_employee_name($r->user_add).' >> '; ?>";
              <? $baris = $baris +1; ?>
              <?php 
                            } 
                        }
                        ?> 
              closetag      ='</div>';



var fwidth='550px'; //set scroller width
var fheight='150px'; //set scroller height

var fadelinks=1;  //should links inside scroller content also fade like text? 0 for no, 1 for yes.

///No need to edit below this line/////////////////


var ie4=document.all&&!document.getElementById;
var DOM2=document.getElementById;
var faderdelay=0;
var index=0;


/*Rafael Raposo edited function*/
//function to change content
function changecontent(){
  if (index>=fcontent.length)
    index=0
  if (DOM2){
    document.getElementById("fscroller").style.color="rgb("+startcolor[0]+", "+startcolor[1]+", "+startcolor[2]+")"
    document.getElementById("fscroller").innerHTML=begintag+fcontent[index]+closetag
    if (fadelinks)
      linkcolorchange(1);
    colorfade(1, 15);
  }
  else if (ie4)
    document.all.fscroller.innerHTML=begintag+fcontent[index]+closetag;
  index++
}

// colorfade() partially by Marcio Galli for Netscape Communications.  ////////////
// Modified by Dynamicdrive.com

function linkcolorchange(step){
  var obj=document.getElementById("fscroller").getElementsByTagName("A");
  if (obj.length>0){
    for (i=0;i<obj.length;i++)
      obj[i].style.color=getstepcolor(step);
  }
}

/*Rafael Raposo edited function*/
var fadecounter;
function colorfade(step) {
  if(step<=maxsteps) {	
    document.getElementById("fscroller").style.color=getstepcolor(step);
    if (fadelinks)
      linkcolorchange(step);
    step++;
    fadecounter=setTimeout("colorfade("+step+")",stepdelay);
  }else{
    clearTimeout(fadecounter);
    document.getElementById("fscroller").style.color="rgb("+endcolor[0]+", "+endcolor[1]+", "+endcolor[2]+")";
    setTimeout("changecontent()", delay);
	
  }   
}

/*Rafael Raposo's new function*/
function getstepcolor(step) {
  var diff
  var newcolor=new Array(3);
  for(var i=0;i<3;i++) {
    diff = (startcolor[i]-endcolor[i]);
    if(diff > 0) {
      newcolor[i] = startcolor[i]-(Math.round((diff/maxsteps))*step);
    } else {
      newcolor[i] = startcolor[i]+(Math.round((Math.abs(diff)/maxsteps))*step);
    }
  }
  return ("rgb(" + newcolor[0] + ", " + newcolor[1] + ", " + newcolor[2] + ")");
}

if (ie4||DOM2)
  document.write('<div id="fscroller" style="border:1px solid black;width:'+fwidth+';height:'+fheight+'"></div>');

if (window.addEventListener)
window.addEventListener("load", changecontent, false)
else if (window.attachEvent)
window.attachEvent("onload", changecontent)
else if (document.getElementById)
window.onload=changecontent

</script>
                        	<div class="title"><h3>Slim Scroll</h3></div>
                            <div class="widgetcontent">
                                <div id="scroll1" class="mousescroll">
                                        <ul class="entrylist">
                                              <li>
                                                <div class="entry_wrap">
                                                    <div class="entry_img"><img src="uploads/foto/no-photo.png" alt="" /></div>
                                                    <div class="entry_content">
                                                        <h4><a href="#">Why Won't My Cat Eat?</a></h4>
                                                        <small>Submitted by: <a href="#"><strong>Hiccup</strong></a> - June 10, 2012</small>
                                                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non...</p>
                                                        <p><button class="stdbtn btn_lime">Approve</button> <button class="stdbtn">Decline</button></p>
                                                    </div>
                                                </div>
                                              </li>
                                              <li class="even">
                                                <div class="entry_wrap">
                                                <div class="entry_img"><img src="templates/amanda/images/thumbs/image2.png" alt="" /></div>
                                                <div class="entry_content">
                                                    <h4><a href="#">We Are About Color</a></h4>
                                                    <small>Submitted by: <a href="#"><strong>Hiccup</strong></a> - June 10, 2012</small>
                                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non...</p>
                                                    <p><button class="stdbtn btn_lime">Approve</button> <button class="stdbtn">Decline</button></p>
                                                </div>
                                                </div>
                                              </li>
                                              <li>
                                                <div class="entry_wrap">
                                                <div class="entry_img"><img src="templates/amanda/images/thumbs/image3.png" alt="" /></div>
                                                <div class="entry_content">
                                                    <h4><a href="#">Ancient Technology</a></h4>
                                                    <small>Submitted by: <a href="#"><strong>Hiccup</strong></a> - June 10, 2012</small>
                                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non...</p>
                                                    <p><button class="stdbtn btn_lime">Approve</button> <button class="stdbtn">Decline</button></p>
                                                </div>
                                                </div>
                                              </li>
                                              <li class="even">
                                                <div class="entry_wrap">
                                                <div class="entry_img"><img src="templates/amanda/images/thumbs/image4.png" alt="" /></div>
                                                <div class="entry_content">
                                                    <h4><a href="#">Bird's Nest Soup</a></h4>
                                                    <small>Submitted by: <a href="#"><strong>Hiccup</strong></a> - June 10, 2012</small>
                                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non...</p>
                                                    <p><button class="stdbtn btn_lime">Approve</button> <button class="stdbtn">Decline</button></p>
                                                </div>
                                                </div>
                                              </li>
                                            </ul>                        
                                </div><!--#scroll1-->
                            </div><!--widgetcontent-->
                        </div>
                    
                        
                        <div class="widgetbox">
                            <div class="title"><h3>Tabbed Widget</h3></div>
                            <div class="widgetcontent">
                                <div id="tabs">
                                    <ul>
                                        <li><a href="#tabs-1">Products</a></li>
                                        <li><a href="#tabs-2">Posts</a></li>
                                        <li><a href="#tabs-3">Media</a></li>
                                    </ul>
                                    <div id="tabs-1">
                                        <ul class="listthumb">
                                            <li><img src="templates/amanda/images/thumb/small/thumb1.html" alt="" /> <a href="#">Proin elit arcu, rutrum commodo</a></li>
                                            <li><img src="templates/amanda/images/thumb/small/thumb2.html" alt="" /> <a href="#">Aenean tempor ullamcorper leo</a></li>
                                            <li><img src="templates/amanda/images/thumb/small/thumb3.html" alt="" /> <a href="#">Vehicula tempus, commodo a, risus</a></li>
                                            <li><img src="templates/amanda/images/thumb/small/thumb4.html" alt="" /> <a href="#">Donec sollicitudin mi sit amet mauris</a></li>
                                            <li><img src="templates/amanda/images/thumb/small/thumb5.html" alt="" /> <a href="#">Curabitur nec arcu</a></li>
                                        </ul>
                                    </div>
                                    <div id="tabs-2">
                                        <ul>
                                            <li><a href="#">Proin elit arcu, rutrum commodo</a></li>
                                            <li><a href="#">Aenean tempor ullamcorper leo</a></li>
                                            <li><a href="#">Vehicula tempus, commodo a, risus</a></li>
                                            <li><a href="#">Donec sollicitudin mi sit amet mauris</a></li>
                                            <li><a href="#">Curabitur nec arcu</a></li>
                                        </ul>
                                    </div>
                                    <div id="tabs-3">
                                        <ul class="thumb">
                                            <li><a href="#"><img src="templates/amanda/images/thumb/xsmall/thumb1.html" alt="" /></a></li>
                                            <li><a href="#"><img src="templates/amanda/images/thumb/xsmall/thumb2.html" alt="" /></a></li>
                                            <li><a href="#"><img src="templates/amanda/images/thumb/xsmall/thumb3.html" alt="" /></a></li>
                                            <li><a href="#"><img src="templates/amanda/images/thumb/xsmall/thumb4.html" alt="" /></a></li>
                                            <li><a href="#"><img src="templates/amanda/images/thumb/xsmall/thumb5.html" alt="" /></a></li>
                                            <li><a href="#"><img src="templates/amanda/images/thumb/xsmall/thumb6.html" alt="" /></a></li>
                                            <li><a href="#"><img src="templates/amanda/images/thumb/xsmall/thumb7.html" alt="" /></a></li>
                                            <li><a href="#"><img src="templates/amanda/images/thumb/xsmall/thumb8.html" alt="" /></a></li>
                                        </ul>     
                                    </div>
                                </div><!--#tabs-->
                            </div><!--widgetcontent-->
                        </div><!--widgetbox-->
                        
                        <div class="widgetbox">
                            <div class="title"><h3>Accordion</h3></div>
                            <div class="widgetcontent">
                                <div id="accordion" class="accordion">
                                    <h3><a href="#">Section 1</a></h3>
                                    <div>
                                        <p>
                                        Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
                                        ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
                                        amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
                                        odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
                                        </p>
                                    </div>
                                    <h3><a href="#">Section 2</a></h3>
                                    <div>
                                        <p>
                                        Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
                                        purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
                                        velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
                                        suscipit faucibus urna.
                                        </p>
                                    </div>
                                    <h3><a href="#">Section 3</a></h3>
                                    <div>
                                        <p>
                                        Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
                                        Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
                                        ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
                                        lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
                                        </p>
                                        <ul class="margin1020">
                                            <li>List item one</li>
                                            <li>List item two</li>
                                            <li>List item three</li>
                                        </ul>
                                    </div>
                                    <h3><a href="#">Section 4</a></h3>
                                    <div>
                                        <p>
                                        Cras dictum. Pellentesque habitant morbi tristique senectus et netus
                                        et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
                                        faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
                                        mauris vel est.
                                        </p>
                                        <p>
                                        Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
                                        Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                                        inceptos himenaeos.
                                        </p>
                                    </div>
                                </div>     
                              </div> <!--widgetcontent-->
                         </div><!--widgetbox-->      
                         
                        <div class="widgetbox">
                            <div class="title"><h3>Recent Activity</h3></div>
                            <div class="widgetcontent">
                                <ul class="recent_list">
                                    <li class="user new">
                                        <div class="msg">
                                            <a href="#">Justin Meller</a> added <a href="#">John Doe</a> as Admin.
                                        </div>
                                    </li>
                                    <li class="call new">
                                        <div class="msg">
                                            You missed a call from <a href="#">Porfirio</a>
                                        </div>
                                    </li>
                                    <li class="calendar new">
                                        <div class="msg">
                                            <a href="#">Katherine Kate</a> invited you in an event <a href="#">Rock Party</a>.
                                        </div>
                                    </li>
                                    <li class="settings">
                                        <div class="msg">
                                            <a href="#">Jane Doe</a> updated her profile.
                                        </div>
                                    </li>
                                    <li class="user">
                                        <div class="msg">
                                            <a href="#">Jet Lee</a> is now following you.
                                        </div>
                                    </li>
                                </ul>
                                <div class="msgmore"><a href="#">View All Activities</a></div>
                            </div><!--widgetcontent-->
                        </div><!--widgetbox-->
                    
                    </div><!--one_half last-->
                            
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->