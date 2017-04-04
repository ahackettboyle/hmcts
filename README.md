# hmcts

This repo should build a six server development and production environment using ansible and managed by jenkins with this repo as SCM (assuming in a real deployment that a private git server would be used)

To use this you must have:
- 6 servers connected on a private network (virtual or otherwise)
- At lease three of these servers have a public IP, these will be the management, development and production load balancing machines
- You know the private, and public where appropriate, ips of these machines
- All machines have a basic installation of Ubuntu 14.04
- All of the machines can be accessed via ssh using a single key file which you have access to

Build steps:
- Clone this repo onto your laptop and edit the ansible/master/inventory file with the public ip of your management machine
- Make sure your private key file is saved in ~/.ssh and change the name of the ansible_ssh_private_key_file variable (make sure the location stays as ~/.ssh however
- Add your key file to ansible/roles/installation/files
- run ansible-playbook -i master build_master.yml
- log on jenkins at http://{master_ip}:8080/ 
- Configure jenkins: install plugins, configure admin user and extract the users API token, configure security, configure GitHub API as a git server and get it to automatically manage hooks.
- From here you can either configure jenkins jobs by copying from the jenkins folder of the repo or use the basic playbook below:
    - Add the users api-token and the ip of the management server to ansible/master/groupvars/all/vars.yml 
    - run ansible-playbook -i master configure.yml
 
 - Add the ips of your other servers to the relevant files within ansible/*/group_vars ansible/*/inventory where * is dev or prod as appropriate
 - Pushing these changes to the git repo should trigger a complete build of the enviroment via jenkins
