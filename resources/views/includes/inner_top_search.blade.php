<!-- <form action="{{route('job.list')}}" method="get"> -->
	<!-- Page Title start -->
	<div class="pageSearch pageSearchMargin" id="myHeader">
		<div class="container">
			<div class="searchform">
				<div class="row">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="{{__('Enter key skills or Job title')}}" name="name" id="name" required="required">
						<select class="form-control" id="functional_area_id" name="functional_area_id[]">
							<option value="" selected="selected">Location</option><option value="1">Accountant</option><option value="2">Accounts, Finance &amp; Financial Services</option><option value="3">Admin</option><option value="4">Admin Operation</option><option value="5">Administration</option><option value="6">Administration Clerical</option><option value="7">Advertising</option><option value="8">Advertising</option><option value="9">Advertisment</option><option value="10">Architects &amp; Construction</option><option value="11">Architecture</option><option value="12">Bank Operation</option><option value="13">Business Development</option><option value="14">Business Management</option><option value="15">Business Systems Analyst</option><option value="16">Clerical</option><option value="17">Client Services &amp; Customer Support</option><option value="18">Computer Hardware</option><option value="19">Computer Networking</option><option value="20">Consultant</option><option value="21">Content Writer</option><option value="22">Corporate Affairs</option><option value="23">Creative Design</option><option value="24">Creative Writer</option><option value="25">Customer Support</option><option value="26">Data Entry</option><option value="27">Data Entry Operator</option><option value="28">Database Administration (DBA)</option><option value="29">Development</option><option value="30">Distribution &amp; Logistics</option><option value="31">Education &amp; Training</option><option value="32">Electronics Technician</option><option value="33">Engineering</option><option value="34">Engineering Construction</option><option value="35">Executive Management</option><option value="36">Executive Secretary</option><option value="37">Field Operations</option><option value="38">Front Desk Clerk</option><option value="39">Front Desk Officer</option><option value="40">Graphic Design</option><option value="41">Hardware</option><option value="42">Health &amp; Medicine</option><option value="43">Health &amp; Safety</option><option value="44">Health Care</option><option value="45">Health Related</option><option value="46">Hotel Management</option><option value="47">Hotel/Restaurant Management</option><option value="48">HR</option><option value="49">Human Resources</option><option value="50">Import &amp; Export</option><option value="51">Industrial Production</option><option value="52">Installation &amp; Repair</option><option value="53">Interior Designers &amp; Architects</option><option value="54">Intern</option><option value="55">Internship</option><option value="56">Investment Operations</option><option value="57">IT Security</option><option value="58">IT Systems Analyst</option><option value="59">Legal &amp; Corporate Affairs</option><option value="60">Legal Affairs</option><option value="61">Legal Research</option><option value="62">Logistics &amp; Warehousing</option><option value="63">Maintenance/Repair</option><option value="64">Management Consulting</option><option value="65">Management Information System (MIS)</option><option value="66">Managerial</option><option value="67">Manufacturing</option><option value="68">Manufacturing &amp; Operations</option><option value="69">Marketing</option><option value="70">Marketing</option><option value="71">Media - Print &amp; Electronic</option><option value="72">Media &amp; Advertising</option><option value="73">Medical</option><option value="74">Medicine</option><option value="75">Merchandising</option><option value="76">Merchandising &amp; Product Management</option><option value="77">Monitoring &amp; Evaluation (M&amp;E)</option><option value="78">Network Administration</option><option value="79">Network Operation</option><option value="80">Online Advertising</option><option value="81">Online Marketing</option><option value="82">Operations</option><option value="83">Planning</option><option value="84">Planning &amp; Development</option><option value="85">PR</option><option value="86">Print Media</option><option value="87">Printing</option><option value="88">Procurement</option><option value="89">Product Developer</option><option value="90">Product Development</option><option value="91">Product Development</option><option value="92">Product Management</option><option value="93">Production</option><option value="94">Production &amp; Quality Control</option><option value="95">Project Management</option><option value="96">Project Management Consultant</option><option value="97">Public Relations</option><option value="98">QA</option><option value="99">QC</option><option value="100">Qualitative Research</option><option value="101">Quality Assurance (QA)</option><option value="102">Quality Control</option><option value="103">Quality Inspection</option><option value="104">Recruiting</option><option value="105">Recruitment</option><option value="106">Repair &amp; Overhaul</option><option value="107">Research &amp; Development (R&amp;D)</option><option value="108">Research &amp; Evaluation</option><option value="109">Research &amp; Fellowships</option><option value="110">Researcher</option><option value="111">Restaurant Management</option><option value="112">Retail</option><option value="113">Retail &amp; Wholesale</option><option value="114">Retail Buyer</option><option value="115">Retail Buying</option><option value="116">Retail Merchandising</option><option value="117">Safety &amp; Environment</option><option value="118">Sales</option><option value="119">Sales &amp; Business Development</option><option value="120">Sales Support</option><option value="121">Search Engine Optimization (SEO)</option><option value="122">Secretarial, Clerical &amp; Front Office</option><option value="123">Security</option><option value="124">Security &amp; Environment</option><option value="125">Security Guard</option><option value="126">SEM</option><option value="127">SMO</option><option value="128">Software &amp; Web Development</option><option value="129">Software Engineer</option><option value="130">Software Testing</option><option value="131">Stores &amp; Warehousing</option><option value="132">Supply Chain</option><option value="133">Supply Chain Management</option><option value="134">Systems Analyst</option><option value="135">Teachers/Education, Training &amp; Development</option><option value="136">Technical Writer</option><option value="137">Tele Sale Representative</option><option value="138">Telemarketing</option><option value="139">Training &amp; Development</option><option value="140">Transportation &amp; Warehousing</option><option value="141">TSR</option><option value="142">Typing</option><option value="143">Warehousing</option><option value="144">Web Developer</option><option value="145">Web Marketing</option><option value="146">Writer</option>
						</select>
						<select class="form-control" name="functional_area_id[]">
							<option value="" selected="selected">Job Type</option><option value="1">Accountant</option><option value="2">Accounts, Finance &amp; Financial Services</option><option value="3">Admin</option><option value="4">Admin Operation</option><option value="5">Administration</option><option value="6">Administration Clerical</option><option value="7">Advertising</option><option value="8">Advertising</option><option value="9">Advertisment</option><option value="10">Architects &amp; Construction</option><option value="11">Architecture</option><option value="12">Bank Operation</option><option value="13">Business Development</option><option value="14">Business Management</option><option value="15">Business Systems Analyst</option><option value="16">Clerical</option><option value="17">Client Services &amp; Customer Support</option><option value="18">Computer Hardware</option><option value="19">Computer Networking</option><option value="20">Consultant</option><option value="21">Content Writer</option><option value="22">Corporate Affairs</option><option value="23">Creative Design</option><option value="24">Creative Writer</option><option value="25">Customer Support</option><option value="26">Data Entry</option><option value="27">Data Entry Operator</option><option value="28">Database Administration (DBA)</option><option value="29">Development</option><option value="30">Distribution &amp; Logistics</option><option value="31">Education &amp; Training</option><option value="32">Electronics Technician</option><option value="33">Engineering</option><option value="34">Engineering Construction</option><option value="35">Executive Management</option><option value="36">Executive Secretary</option><option value="37">Field Operations</option><option value="38">Front Desk Clerk</option><option value="39">Front Desk Officer</option><option value="40">Graphic Design</option><option value="41">Hardware</option><option value="42">Health &amp; Medicine</option><option value="43">Health &amp; Safety</option><option value="44">Health Care</option><option value="45">Health Related</option><option value="46">Hotel Management</option><option value="47">Hotel/Restaurant Management</option><option value="48">HR</option><option value="49">Human Resources</option><option value="50">Import &amp; Export</option><option value="51">Industrial Production</option><option value="52">Installation &amp; Repair</option><option value="53">Interior Designers &amp; Architects</option><option value="54">Intern</option><option value="55">Internship</option><option value="56">Investment Operations</option><option value="57">IT Security</option><option value="58">IT Systems Analyst</option><option value="59">Legal &amp; Corporate Affairs</option><option value="60">Legal Affairs</option><option value="61">Legal Research</option><option value="62">Logistics &amp; Warehousing</option><option value="63">Maintenance/Repair</option><option value="64">Management Consulting</option><option value="65">Management Information System (MIS)</option><option value="66">Managerial</option><option value="67">Manufacturing</option><option value="68">Manufacturing &amp; Operations</option><option value="69">Marketing</option><option value="70">Marketing</option><option value="71">Media - Print &amp; Electronic</option><option value="72">Media &amp; Advertising</option><option value="73">Medical</option><option value="74">Medicine</option><option value="75">Merchandising</option><option value="76">Merchandising &amp; Product Management</option><option value="77">Monitoring &amp; Evaluation (M&amp;E)</option><option value="78">Network Administration</option><option value="79">Network Operation</option><option value="80">Online Advertising</option><option value="81">Online Marketing</option><option value="82">Operations</option><option value="83">Planning</option><option value="84">Planning &amp; Development</option><option value="85">PR</option><option value="86">Print Media</option><option value="87">Printing</option><option value="88">Procurement</option><option value="89">Product Developer</option><option value="90">Product Development</option><option value="91">Product Development</option><option value="92">Product Management</option><option value="93">Production</option><option value="94">Production &amp; Quality Control</option><option value="95">Project Management</option><option value="96">Project Management Consultant</option><option value="97">Public Relations</option><option value="98">QA</option><option value="99">QC</option><option value="100">Qualitative Research</option><option value="101">Quality Assurance (QA)</option><option value="102">Quality Control</option><option value="103">Quality Inspection</option><option value="104">Recruiting</option><option value="105">Recruitment</option><option value="106">Repair &amp; Overhaul</option><option value="107">Research &amp; Development (R&amp;D)</option><option value="108">Research &amp; Evaluation</option><option value="109">Research &amp; Fellowships</option><option value="110">Researcher</option><option value="111">Restaurant Management</option><option value="112">Retail</option><option value="113">Retail &amp; Wholesale</option><option value="114">Retail Buyer</option><option value="115">Retail Buying</option><option value="116">Retail Merchandising</option><option value="117">Safety &amp; Environment</option><option value="118">Sales</option><option value="119">Sales &amp; Business Development</option><option value="120">Sales Support</option><option value="121">Search Engine Optimization (SEO)</option><option value="122">Secretarial, Clerical &amp; Front Office</option><option value="123">Security</option><option value="124">Security &amp; Environment</option><option value="125">Security Guard</option><option value="126">SEM</option><option value="127">SMO</option><option value="128">Software &amp; Web Development</option><option value="129">Software Engineer</option><option value="130">Software Testing</option><option value="131">Stores &amp; Warehousing</option><option value="132">Supply Chain</option><option value="133">Supply Chain Management</option><option value="134">Systems Analyst</option><option value="135">Teachers/Education, Training &amp; Development</option><option value="136">Technical Writer</option><option value="137">Tele Sale Representative</option><option value="138">Telemarketing</option><option value="139">Training &amp; Development</option><option value="140">Transportation &amp; Warehousing</option><option value="141">TSR</option><option value="142">Typing</option><option value="143">Warehousing</option><option value="144">Web Developer</option><option value="145">Web Marketing</option><option value="146">Writer</option>
						</select>
						<div class="input-group-append">
							<button class="btn btn-default" type="button" id="send_subscription_form">{{__('Search')}}</button>			  
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<!-- <div class="row">  -->
					<div class="navbar navbar-expand-lg navbar-light bg-light custom">
						<!-- <div class="container-fluid"> -->
							<ul class="navbar-nav nav-justified">
								<!-- Dropdown -->
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
											Sector
										</a>
										<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" data-popper-placement="bottom-start" data-mdb-popper="null" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 44px);">
											<li>Action</li>
											<li>Another action</li>
											<li>Submenu item 1</li>
											<li>
												Submenu item 2
											</li>
											<li>
												Submenu item 4
											</li>
											<li>
												Submenu item 5
											</li>
										</ul>
									</li>
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
										Expertise
										</a>
										<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" data-popper-placement="bottom-start" data-mdb-popper="null" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 44px);">
										<li>
										Action
										</li>
										<li>
										Another action
										</li>
										<li>
										Submenu item 1
										</li>
										<li>
										Submenu item 2
										</li>
										<li>
										Submenu item 4
										</li>
										<li>
										Submenu item 5
										</li>
										</ul>
									</li>
									<li class="nav-item dropdown px-2">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
										Language
										</a>
										<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" data-popper-placement="bottom-start" data-mdb-popper="null" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 44px);">
										<li>
											Action
										</li>
										<li>
											Another action
										</li>
										<li>
											Submenu item 1
										</li>
										<li>
											Submenu item 2
										</li>
										<li>
											Submenu item 4
										</li>
										<li>
											Submenu item 5
										</li>
										</ul>
									</li>
							</ul>
						<!-- </div> -->
					</div>
				<!-- </div> -->
			</div>
		</div>
	</div>
	<!-- Page Title end -->
<!-- </form> -->
<style>
	.sticky {
	position: fixed;
	top: 0;
	width: 100%;
	z-index: 1;
}

.input-group .form-control {
	/* border: 1px; !importent; */
	font-weight: bold;
}
.pageSearchMargin {
	margin: 0px 18px;
}
.custom ul li:not(.custom>li>ul){
	display: flex;
  justify-content: space-between;
  padding: 0px 80px;
  align-items: center;
}

.custom ul li a{
	font-size: 18px;
}
.custom ul li a:hover{
	background-color: #0f4e9e;
	border-radius: 2px;
	padding: 10px;
}

</style>
<script>
window.onscroll = function() {myFunction()};

var header = document.querySelector("#myHeader");
var container = document.querySelector('.container-fluid');
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
	header.classList.remove('pageSearchMargin');
	// container.classList.remove("container-fluid");
  } else {
    header.classList.remove("sticky");
	header.classList.add('pageSearchMargin');
	// container.classList.add("container-fluid");
  }
}
</script>
