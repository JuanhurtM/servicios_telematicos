Vagrant.configure("2") do |config|

  if Vagrant.has_plugin? "vagrant-vbguest"
     config.vbguest.no_install = true
     config.vbguest.auto_update = false
     config.vbguest.no_remote = true
  end
  config.vm.define :esclavo do |esclavo|
    esclavo.vm.provision "shell", path: "esclavo.sh.txt"
    esclavo.vm.box = "bento/centos-7.9"
    esclavo.vm.network :private_network, ip: "192.168.100.2"
    esclavo.vm.hostname = "esclavo"
    esclavo.vm.provider "virtualbox" do |v|
      v.cpus = 2 
    end
  end
  config.vm.define :firewall do |firewall|
    firewall.vm.provision "shell", path: "firewall.sh.txt"
    firewall.vm.box = "bento/centos-7.9"
    firewall.vm.network :public_network, ip: "192.168.1.130"
    firewall.vm.network :private_network, ip: "192.168.100.3"
    firewall.vm.hostname = "firewall"
    firewall.vm.provider "virtualbox" do |v|
      v.cpus = 2 
    end
  end
  config.vm.define :maestro do |maestro|
    maestro.vm.provision "shell", path: "maestro.sh.txt"
    maestro.vm.box = "bento/centos-7.9"
    maestro.vm.network :private_network, ip: "192.168.100.4"
    maestro.vm.hostname = "maestro"
    maestro.vm.provider "virtualbox" do |v|
      v.cpus = 2 
    end
  end
end