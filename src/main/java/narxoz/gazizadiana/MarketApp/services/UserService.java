package narxoz.gazizadiana.MarketApp.services;

import narxoz.gazizadiana.MarketApp.model.Users;
import narxoz.gazizadiana.MarketApp.repository.RoleRepository;
import narxoz.gazizadiana.MarketApp.repository.UserRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.security.core.userdetails.UsernameNotFoundException;
import org.springframework.stereotype.Service;

@Service
public class UserService implements UserDetailsService {

    @Autowired
    private UserRepository userRepository;

    @Autowired
    private RoleRepository roleRepository;

    @Override
    public UserDetails loadUserByUsername(String username) throws UsernameNotFoundException {
        Users user = userRepository.findByEmail(username);
        if(user != null){
            return user;
        }
        else throw new UsernameNotFoundException("User Not Found");

    }





}
