### 这是什么
这是一个运行在波场上的智能合约，是一个互助合约，大家投入任意金额的波场币，在1到10年内有三倍的产出，先投入先产出，先产出再投入，循环往复
### 特点
请注意这和绝大多数波场DAPP的最大区别是所有规则代码均写入了智能合约，并且开源，不像大多数DAPP那要，只有转账提现写入了合约
### 部署流程
- 发布合约
- 部署DAPP前端页面
- 部署PHP命令行代码

### 使用TronIDE+TronLink发布合约
- TronLink钱包中选择好发布的节点，登录好发布用的账号（账号中要有TRX）。在TronIDE<http://tronide.io>中打开Soldity源码，填写好初始化参数后直接点击Deploy。
- 初始化参数是9个地址（8个运营地址，1个保险地址），在TronIDE中发布的时候地址是16进制去掉开头41的值
- 测试参数格式0xF07EF1209ACED6A1D2AC499CD2AEF101C01CD7AC,0xF07EF1209ACED6A1D2AC499CD2AEF101C01CD7AC,0xDAFEFFD95EAA63E42E8CDC9A5FDCB7A07501E6D9,0xC4C136067AFBE54411AEFC2B77FD05321568946E,0x4484B6FD2DEE79EA01DA4BCC399E7B83D3CB27BF,0x60DC415F66E28994A960CC91A0C761868A153FB2,0xD7951F3BEAE52AC7CBC3D5A7E2E050D425BCE693,0x3582964E7BF98C9460A189736B81FB8C195C81CE,0xD85E06AB3FDEE57FD72E29FAB31E40DF20C1C850
- Shasta节点上已经部署的合约地址是TLpnqMyc3r64THGAPNBn6ajxTkLaDiwJdy
- Shasta节点部署一次大约花费100RTX

### WEB环境(用于部署DAPP页面)
- 需要安装php-memcache（用于读取团队缓存信息）
- 设置web目录指向dapp页面目录即可
- **请注意修改index.html中的合约地址**
- **DAPP中的规则部分尚未填写，可修改js/language.js**

### PHP命令行环境(用于缓存团队信息,调用管理方法等)
- 需要安装php-gmp
需要安装php-memcache
- 其他都是常用模块，可以参照错误提示安装
- **修改config.php中的合约地址，节点地址，发布者地址，发布者私钥**
- 设置定时任务，每隔6小时执行phpcli tron.php cache（时间可以修改，具体看function.php中save_nets函数）
- 设置定时任务，每天格林威治时间13点执行phpcli tron.php top释放排名奖

### 测试节点发布者账号

- 测试节点https://api.shasta.trongrid.io
- 账号地址TPJTrXg7pPJ6HcQALUSVmyqfzFLNdBmfUL
- 助记词（cricket admit student cruise jealous lava enact enforce unable piano fantasy sail）
- 获取测试币https://www.trongrid.io/shasta/#request

### 开发,优化，调试备忘录
- 如果要使用PHP调用新的合约方法，需要更新abi.php中的abi代码
- 如果能记录当前玩家的index，缓存的时候按index层级缓存可以加速缓存时间

### 目录说明
- dapp 前端页面
- solidity 合约代码
- server php辅助工具