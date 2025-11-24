 pipeline {
  agent any

  environment {
    DOCKERHUB = credentials('DockerHub')         // Exposes DOCKERHUB_USR / DOCKERHUB_PSW
  }

  stages {
    stage('Docker Login') {
      steps {
        sh 'echo "$DOCKERHUB_PSW" | docker login -u "$DOCKERHUB_USR" --password-stdin'
      }
    }

    stage('Pull , build and Run dockerfile ') {
      steps {
       
      sh '''
                docker stop phpapp || true
		        docker rm mphpapp || true
		        docker rmi richardthomas1/phpapp || true
		        docker build -t richardthomas1/phpapp  . 
				docker compose up -d
        
        '''
      }
    }

   

    
    stage('Run Tests') {
      steps {
        echo "done testing"
      }
    }

  stage ('cleaning'){
  steps{
	  sh  'docker compose down'
	sh 'docker compose down || true'
	   }
  }
  
}
 }
