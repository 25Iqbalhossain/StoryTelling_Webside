# Interactive Storytelling Platform with Branching Narratives.
### Utilized:  HTML, CSS, PHP, MySQL
# STEPS:
1. At first install XAMPP to run this project
2. ### Database name must be storytelling
3. ### Import the database SQL file which exists in the "DB_SQL" folder

```diff
- It supports one story only!

```
# Future Development
1. Support multiple stories.
2. Readers interact with their stories, such as which options are most popular, and a nice-to-have feature that tracks how long users spend on each section.

# Descriptions:
<h3>This platform is developed so that we can read and create interactive stories.</h3>
<ol>
  <li>Create Story Section
      <ul style="list-style-type🔴">
        <li>Users can write interactive story </li>
        <li>Writers can set multiple paths which direct the story</li>
        <li>At the end of each path writer set the result of this path</li>
      </ul>
    </li>
  <li>Read Story Section
     <ul style="list-style-type🔴">
        <li> Users can read already-written stories. </li>
       <li>When a user opens a story to read it, readers are allowed to interact with the story and shape its outcome.</li>
       <li>>Rather than being limited to a linear narrative, readers can choose from a variety of options to determine where the story will go. This means that every reader can have a unique experience and create their own story. It also means that readers can go back and explore different paths and endings.</li>
     </ul>
  
  </li>
  <li> Popularity Tracking Section 
      <ul style="list-style-type🔴">
      <li>Store user's interaction of each story and its path </li>
        <li>This section helps readers to identify the favorite story and also helps to find out the most popular decision path which is clicked more times</li>
      </ul>
  </li>
</ol>


# Database:
### Database Name: storytelling

![tree](https://github.com/user-attachments/assets/30e9a127-e30a-47c3-ae01-e425aff199b6)
# Database Tables
<ol>
  <li>
    <ul><li> <b>users : </b></li> </ul>
    <table>
      <caption> Readers & Writers </caption><br>
      <br>
      <tr>
        <th>name</th>
        <th>email</th>
        <th>password</th>
      </tr> 
          <tr>
        <td>Iqbal hossain</td>
        <td>25ikbalhossain@gmail.com</td>
        <td>12345</td>
      </tr> 
          <tr>
          <!-- test case for -->
        <td>Pronob Mozumder</td>
        <td>pornob@yahoo.com</td>
        <td>34567</td>
      </tr> 
    </table>
  </li>
  <li>
    <ul><li><b>story : </b> </li> </ul>
        <table>
          <caption>Story Title:</caption>
      <tr>
        <th>id</th>
        <th>title</th>
        <th>content</th>
      </tr> 
          <tr>
        <td>1</td>
        <td>Decision Tree </td>
        <td>ABCDEFG</td>
      </tr> 
    </table>
  </li>
  <li>
    <ul><li> <b>choices : </b></li> </ul>
    <caption>Left Tree of a Story: </caption><br>   <br>
    <caption>id=> unique id auto-incremented from 500</caption><br>
    <captoin>node_id=> parent node id of this node</captoin><br>
    <caption>first_option=> story path decision content</caption><br>
    <caption>set_decision=> check whether this node expand it's child or not; by default FALSE means not assign it's child yet</caption><br>
    <caption>end_node=> Assign True if it is the end of this path; by default FALSE value is assigned. Assign value True means this is the end of the path </caption><br>
    <table>
      <tr>
        <th>id</th>
         <th>node_id</th>
         <th>first_option</th>
         <th>set_decision</th>
         <th>end_node</th>
      </tr>
      <tr>
        <td>500</td>
         <td>1</td>
         <td>B</td>
         <td>1</td>
         <td>0</td>
      </tr>
            <tr>
        <td>501</td>
         <td>500</td>
         <td>D</td>
         <td>1</td>
         <td>1</td>
      </tr>
            <tr>
        <td>502</td>
         <td>500</td>
         <td>E</td>
         <td>1</td>
         <td>1</td>
      </tr>
    </table>
  </li>
  <li>
    <ul><li> <b>choices2 : </b></li> </ul>
      <captoin>Right Tree of Tree</captoin><br>   <br>
    <caption>id=> unique id auto-incremented from 5000</caption><br>
    <captoin>node_id=> parent node id of this node</captoin><br>
    <caption>second_option=> story path decision content</caption><br>
    <caption>set_decision=> check whether this node expand it's child or not; by default FALSE means not assign it's child yet</caption><br>
    <caption>end_node=> Assign True if it is the end of this path; by default FALSE value is assigned. Assign value True means this is the end of the path </caption><br>
        <table>
          <tr>
          <th>id</th>
           <th>node_id</th>
           <th>second_option</th>
           <th>set_decision</th>
           <th>end_node</th>
        </tr>
      <tr>
        <td>5000</td>
         <td>1</td>
         <td>C</td>
         <td>1</td>
         <td>0</td>
      </tr>
            <tr>
        <td>5001</td>
         <td>5000</td>
         <td>F</td>
         <td>1</td>
         <td>1</td>
      </tr>
            <tr>
        <td>5002</td>
         <td>5000</td>
         <td>G</td>
         <td>1</td>
         <td>1</td>
      </tr>
    </table>

  </li>
  
</ol>
