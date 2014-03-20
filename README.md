smb214-PHP
==========

<h3>I. Introduction:</h3>
Les Services Web sont un moyen de communication qui permet une bonne fonctionnalité entre les différentes applications sur différentes plates-formes. Notre exemple est de faire communiquer un site web développé en PHP avec les services web développés en JAVA.

Pour identifier la liste des fonctions et le type des paramètres et des résultats, nous utilisons les fichier WSDL (Web Services Description Language) et le XSD fourni par le développeur des services Web.

<h3>II. L'exemple:</h3>
C'est un petit site web en PHP qui a le role d'afficher les notes d'un élève appartenantes à une année scolaire et puis en examen spécifique. Ce site est déployé dans un serveur Apache qui à son tour communique avec une base de données installée sur un nouveau serveur MySQL

<h3>III. La base de données:</h3>
La base de données de ce site ne contient qu'une table d'utilisateur "user" qui contient le mot d'usager, le mot de passe, l'id de l'élève dans la base de données de l'école.

<h3>IV. Le site:</h3>
Le site contient 4 pages essentielles:
  1.  login.php //c'est la page de login
  2.  index.php //c'est la page principale où l'élève doit choisir les paramêtres pour afficher son carnet dans la page         carnet.php.
      Le formulaire de cette page affiche en premier lieur un select. Ce dernier demande une requête SOAP de notre              application afin d'afficher la liste des années scolaires.
      Un fois choisi, un script <b>jQuerry + Ajax</b> accède la page getExamList.php qui à son tour demande une requête         SOAP de notre application afin d'afficher la liste des examens appartenant à l'année scolaire envoyée en paramètre
  3.  getExamList.php //c'est la classe qui est appelée par une requêtes Ajax et demande à son tour une requête                 SOAP de notre application afin d'afficher la liste des examens appartenant à l'année scolaire envoyée en paramètre
  4.  carnet.php //c'est la page qui affiche le livret de l'élève.
      Cette dernière demande deux requêtes SOAP de notre application afin d'afficher la liste des matières et leur              coefficient en utilisant la fonction getStudentClassCourse et la liste des notes correspondantes en utilisant la          fonction getStudentExamGrades.
