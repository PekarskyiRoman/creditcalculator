To deploy the project you need to take the following steps:
1. Clone GitHub repository by command:

git clone https://github.com/PekarskyiRoman/creditcalculator.git <your_folder_name>

If you do not specify a folder name, a folder named creditcalculator will be created

2. Open the folder created after cloning the repository with the command: 

cd <folder _name>

3. Install all dependencies with the command:

composer install

4. Add a home domain folder to the server settings:

<full_path_to_folder_from_step_1>/<your_folder_name_from_step_1>/frontend/web

location / {
root       "<full_path_to_folder_from_step_1>/<your_folder_name_from_step_1>/frontend/web";
index      index.php index.html index.htm;
}
