@extends('layouts.app')
<head>
    <title>Home</title>
</head>
@section('main')
  <!-- <body onload="alert('Welcome to My Personal CV page!')"> -->
    <header>
      <div id="main-header">

          <h1 id="pgKey">About Me</h1>
          <p>This is a personal CV of my Soft/Hard skills</p>
          <p>Along with my education, contact details, and work experiences</p>
      </div>
    </header>
    <br/>
    <section>
      <div id="container" class="homeContainer">
        <div id="contacts">
          <h2>Contact Details</h2>
          <blockquote>
            <p>Ibrahim Ahmad</p>
            <p>Contact Email: 210029073@aston.ac.uk</p>
            <p>Student Number: 210029073</p>
          </blockquote>
        </div>

        <div id="work_experience">
          <h2>Work Experience</h2>
          <blockquote>
            <ul>
              <li>Assistant Pharmacist - Lloyds Pharmacy</li>
            </ul>
          </blockquote>
        </div>

        <div id="education">
          <h2>Education</h2>
          <blockquote>
            <ul>
              <li>GCSE</li>
              <li>BTEC Level 3 Extended Diploma in IT</li>
              <li>
                BSc in Computer Science with Work Placement Year (Still
                Completing)
              </li>
            </ul>
          </blockquote>
        </div>

        <div id="interests">
          <h2>Hobbies</h2>
          <blockquote>
            <p>
              Installing and Customising a Linux Operating System (Arch Linux)
            </p>
            <p>
              Eager to Learn new things through the available online resources
              at my free time
            </p>
          </blockquote>
        </div>
        <div id="softSkills">
          <h2>Skills</h2>
          <!-- Add bars to programming -->
          <!-- for experience ratings  -->
          <!-- logo for each of them -->
          <h3>Soft Skills</h3>
          <blockquote>
            <p>
              Teamwork skills in terms of managing each others progress, as well
              as managing enquiries from each team member.
            </p>

            <p>
              Time management in terms of managing time using a calendar and
              spreadsheet to prioritise tasks for dependent tasks and for
              concurrent tasks.
            </p>

            <p>
              Professional attitude towards work and learning, in terms of
              prioritising work.
            </p>

            <p>
              Good problem-solving skills in programming skills, however I will
              need to reflect upon this skills throughout my IT career.
            </p>
          </blockquote>
        </div>

        <div id="profile">
          <blockquote>
            <h2>Links to Professional Profiles</h2>

            <div>
              <p>Linkedin</p>
              <!-- Linkedin Logo https://the-white-label.com/wp-content/uploads/2021/05/linkedin-icon-1024x1024.png -->
              <img
                src="PNG/174857.png"
                alt="Linkedin Logo"
                height="50"
                width="50"
              />
              <span
                ><a href="https://www.linkedin.com/in/ibrahim-ahmad-ab3714231/"
                  >Follow me at 210029073</a
                ></span
              >
            </div>

            <div>
              <p>Github</p>
              <!-- Github logo https://github.com/logos -->
              <img
                src="PNG/GitHub-Mark-120px-plus.png"
                alt="Github Logo"
                height="50"
                width="50"
              />
              <span
                ><a href="https://github.com/210029073"
                  >Explore my Repositories at 210029073</a
                ></span
              >
            </div>

            <div>
              <p>Twitter</p>
              <!-- Twitter Logo https://1000logos.net/wp-content/uploads/2017/06/Logo-Twitter.jpg -->
              <img
                src="PNG/124021.png"
                alt="Twitter Logo"
                height="50"
                width="50"
              />
              <span>
                <a
                  href="https://twitter.com/AstonUniversity?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"
                  >Follow me at 210029073</a
                ></span
              >
            </div>
          </blockquote>
        </div>

        <div id="hardSkills">
          <h3>Hard Skills</h3>
          <p>Computer skills</p>
          <p>Technical Skills</p>
          <br />
          <h3>Programming Language Skills</h3>
          <div id="hardSkills-content">
            <!--<blockquote>-->
            <div>
              <p>CSharp</p>
              <!-- CSharp logo https://hi.wikipedia.org/wiki/%E0%A4%9A%E0%A4%BF%E0%A4%A4%E0%A5%8D%E0%A4%B0:C_Sharp_wordmark.svg -->
              <img
                src="PNG/800px-C_Sharp_wordmark.svg.png"
                alt="CSharp logo"
                width="50"
                height="50"
              />
              <h5>Experience Rating:</h5>
              <span id="experienceIDCSharp">12%</span>
            </div>

            <!-- C/C++ Logo https://en.wikipedia.org/wiki/C%2B%2B#/media/File:ISO_C++_Logo.svg  -->
            <div>
              <p>C/C++</p>
              <img
                src="PNG/cpp_logo.png"
                alt="C++/C Logo"
                width="50"
                height="55"
              />
              <h5>Experience Rating:</h5>
              <span id="experienceIDCpp">36%</span>
            </div>

            <!-- HTML Logo https://en.wikipedia.org/wiki/HTML#/media/File:HTML5_logo_and_wordmark.svg -->
            <div>
              <p>HTML</p>
              <img
                src="PNG/800px-HTML5_logo_and_wordmark.svg.png"
                alt="HTML logo"
                width="60"
                height="55"
              />
              <h5>Experience Rating:</h5>
              <span id="experienceIDHTML">93%</span>
            </div>

            <!-- CSS Logo https://en.wikipedia.org/wiki/CSS#/media/File:CSS3_logo_and_wordmark.svg -->
            <div>
              <p>CSS</p>
              <img
                src="PNG/CSS3_logo_and_wordmark.svg.png"
                alt="CSS logo"
                width="40"
                height="55"
              />
              <h5>Experience Rating:</h5>
              <span id="experienceIDCSS">67%</span>
            </div>
            <br />
            <br />
            <br />

            <!-- JavaScript Logo https://miro.medium.com/fit/c/1360/1360/2*ANq7W6EbsF1cy2igkqE8_w.png -->
            <div>
              <p>JavaScript</p>
              <img
                src="PNG/JavaScript-logo.png"
                alt="JavaScript logo"
                width="55"
                height="55"
              />
              <h5>Experience Rating:</h5>
              <span id="experienceIDJS">54%</span>
            </div>
            <br />
            <br />
            <br />
            <!-- Java Icon https://external-preview.redd.it/gUVm956M2zf-Z96Kr8yfIZLmU0oyEQLLWDnn8qd0Klk.jpg?auto=webp&s=426c47897e7bcbcfe3ed6133a6623797ddf3197a -->
            <div>
              <p>Java</p>
              <img
                src="PNG/Java_programming_language_logo.svg.png"
                alt="Java Logo"
                width="35"
                height="55"
              />
              <h5>Experience Rating:</h5>
              <span id="experienceIDJAVA">73%</span>
            </div>
            <!-- Linux Tux Logo https://upload.wikimedia.org/wikipedia/commons/3/35/Tux.svg -->
            <div>
              <p>Shell Scripting in Linux</p>
              <img
                src="PNG/Tux.svg.png"
                alt="Linux Tux Logo"
                width="65"
                height="75"
              />
              <h5>Experience Rating:</h5>
              <span id="experienceIDLinux">53%</span>
            </div>
          </div>
        </div>
        <br />
      </div>
    </section>

    <section>
      <div id="uxExperience">
        <form>
          <h3>How do you find my website?</h3>

          <span>
            <select id="Ux">
              <option>Non-Specified</option>

              <option>Exceptional</option>

              <option>Very Good</option>

              <option>Satisfactory</option>

              <option>Unsatisfied</option>
            </select>
          </span>
        </form>
      </div>
      <br />
    </section>
    <script src="JS/alterBtnLabel.js"></script>
@endsection
